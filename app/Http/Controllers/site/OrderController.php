<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Card;

use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\File;


use App\Models\OrderModel;
use App\Models\Paymentmethods;
use App\Models\ProductDetail;
use App\Models\Receiver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index($id){
        $data["client"] = Auth::guard("client")->user();
        $data["cart"] = Card::join("cart_detail", "cart_detail.cart_id", "=", "cart.id")
                            ->join("product_detail", "product_detail.id", "=", "cart_detail.product_detail_id")
                            ->join("product", "product.id", "=", "product_detail.product_id")
                            ->select("cart_detail.*", "product_detail.img","product_detail.price","product_detail.color","product_detail.id as product_id", "product.namePro")
                            ->where("cart.client_id", "=", $id)
                            ->where("product_detail.isDeleted", "!=", 0)
                            ->where("product_detail.isSoid", "!=", 0)
                            ->get();
        $data["payment"] = Paymentmethods::all();
        return view("site/Order/checkout", ["data" => $data]);
    }

    public function add(Request $request){
        // thêm dữ liệu vào bảng receiver
        $recever = new Receiver();
        $recever->created_at = Carbon::now();
        $recever->updated_at = Carbon::now();
        $recever->isDeleted = 1;
        $recever->client_id = Auth::guard("client")->user()->id;
        $recever->name = $request->billing_company;
        $recever->address = $request->billing_address_1;
        $recever->phone = $request->billing_phone;
        $recever->sex = 1;
        $recever->save();
        // lấy id thông tin người nhận bản ghi mới nhất (dựa vào id tài khoản tránh trường hợp 2 tài khoản khác nhau đặt hàng cùng lúc)
        $idRecever = Receiver::where("client_id", "=", Auth::guard("client")->user()->id)
                                ->latest()->first()->id;
        // thêm dữ liệu vào bảng order
        $order = new OrderModel();
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->isDeleted = 1;
        $order->client_id = Auth::guard("client")->user()->id;
        $order->receiver_id = $idRecever;
        $order->pay_id = $request->payment_method;
        $order->status = 1;
        $order->sum = $request->sumOrder;
        $order->date_order = Carbon::now();
        $order->save();
        // lấy id đơn hàng bản ghi mới nhất (dựa vào id tài khoản tránh trường hợp 2 tài khoản khác nhau đặt hàng cùng lúc)
        $idOrder = OrderModel::where("client_id", "=", Auth::guard("client")->user()->id)
                                ->latest()->first()->id;
        // thêm dữ liệu vào bảng Order detail
        // lấy thông tin của giỏ hàng
        $cart = Card::join("cart_detail", "cart.id", "=", "cart_detail.cart_id")
                    ->join("product_detail", "product_detail.id", "=", "cart_detail.product_detail_id")
                    ->select("cart_detail.product_detail_id", "cart_detail.quanity", "product_detail.price")
                    ->where("cart.client_id","=",Auth::guard("client")->user()->id)
                    ->get();
        $idCart = Card::where("client_id", "=", Auth::guard("client")->user()->id)->first()->id;
        // Phương pháp nối chuỗi đồng thời sẽ hạ số lượng sản phẩm xuống 
        $stringJson = "[";
        foreach($cart as $cart_detail){
            // nối chuỗi
            $stringJson .= '{
                "created_at": "'.Carbon::now().'",
                "updated_at": "'.Carbon::now().'",
                "product_id": "'.$cart_detail['product_detail_id'].'",
                "order_id": "'.$idOrder.'",
                "price": "'.$cart_detail['price'].'",
                "quanity": "'.$cart_detail['quanity'].'",
                "isDeleted": "1"
            },';

            // Xử lý trừ số lượng sản phẩm
            $product = ProductDetail::find($cart_detail['product_detail_id']);
            // Lấy số lượng và trạng thái sản phẩm trong kho
            $quanityCurrent = $product->quanity;
            $isSoidCurrent = $product->isSoid;
            // cập nhật số lượng sản phẩm
            $quanityUpdate = $quanityCurrent - $cart_detail['quanity'];
            // cập nhật trạng thái sản phẩm
            if($quanityUpdate <= 0){
                $isSoidCurrent = 0;
            }else if($quanityUpdate > 0 && $quanityUpdate <= 10){
                $isSoidCurrent = 1;
            }else{
                $isSoidCurrent = 2;
            }
            // cập nhật sản phẩm
            $product->update([
                "quanity" => $quanityUpdate,
                "isSoid"  => $isSoidCurrent,
            ]);
            $product->save();

            // xoá cart detail
            DB::table("cart_detail")->where("cart_id", "=", $idCart)
            ->where("product_detail_id", "=", $cart_detail['product_detail_id'])
            ->delete();               
        }
        // bỏ dấu , ở cuối chuỗi lớn 
        $stringJson = rtrim($stringJson, ',') . "]";
        $stringArray = json_decode($stringJson, true);
        DB::table('order_detail')->insert($stringArray);

        // xem phương thức thanh toán là loại nào
        // nếu là thanh toán sau 
        if($request->payment_method == 2){
            return view("site/Order/thankyou");
        }
        // nếu là chuyển khoản -> quét QR
        if($request->payment_method == 1){
            $accountNumber = 'YOUR_ACCOUNT_NUMBER';
            $amount = '1000000'; // Số tiền theo đơn vị của bạn

            // Tạo nội dung cho mã QR
            $qrContent = "bank://transfer?to=$accountNumber&amount=$amount";

            // Tạo mã QR
            $qrCode = new QrCode($qrContent);
            // dd($qrCode);
            return view('site/Order/QR', compact('qrCode'));
        }
    }

    public function list(){
        $data['order'] = OrderModel::where("isDeleted", "!=", 0)
                                    ->where("client_id", "=", Auth::guard("client")->user()->id)
                                    ->get();
        return view("site/Order/list", ["data" => $data]);
    }

    public function show($id){
        $data = OrderModel::join("order_detail", "order_detail.order_id", "=", "order.id")
                            ->join("receiver", "receiver.id", "=", "order.receiver_id")
                            ->join("payment_methods", "payment_methods.id", "=", "order.pay_id")
                            ->join("product_detail", "product_detail.id", "=", "order_detail.product_id")
                            ->join("product", "product_detail.product_id", "=", "product.id")
                            ->select("order.*", "order_detail.price", "product.namePro", "product_detail.color",
                                    "receiver.name", "receiver.phone", "receiver.address", "receiver.sex",
                                    "payment_methods.namePay", "order_detail.quanity")
                            ->where("order.isDeleted", "!=", 0)
                            ->where("order.id", "=", $id)
                            ->get();
        return view("site/Order/detail", ["data" => $data]);
    }

    public function deleted($id){
        // Cập nhật trạng thái huỷ đơn
        $order = OrderModel::find($id);
        $order->update([
            "updated_at" => Carbon::now(),
            "status" => 0,
        ]);
        $order->save();
        // Trả số lượng về
        $product = ProductDetail::join("order_detail", "order_detail.product_id", "=", "product_detail.id")
                                ->join("order", "order_detail.order_id", "=", "order.id")
                                ->select("order_detail.quanity", "product_detail.id")
                                ->where("product_detail.isDeleted", "!=", 0)
                                ->where("order.isDeleted", "!=", 0)
                                ->where("order.id", "=", $id)
                                ->get();
        // dd($product);
        foreach($product as $pro){
            // Lấy sản phẩm cần cập nhật
            $productDetail = ProductDetail::where("isDeleted", "!=", 0)
                            ->find($pro['id']);
            // Cập nhật số lượng sản phẩm 
            $quanityCurrent = $productDetail->quanity;
            $quanityBonus = $pro["quanity"];
            $sumQuanity = $quanityCurrent + $quanityBonus;
            $productDetail->update([
                "updated_at" => Carbon::now(),
                "quanity" => $sumQuanity,
            ]);
            $productDetail->save();
        }
        notyf()->addSuccess("Huỷ đơn thành công");
        return redirect("/site/order/show/". $id);
    }
}
