<?php

namespace App\Http\Controllers\site;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\Receiver;
use App\Models\OrderModel;
use App\Models\ProductDetail;
use App\Models\discount_code;
use App\Models\Paymentmethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /*
    function: index (show view checkout)
    @redirect: /site/order/index
    @methods: get
    @param: $id (id cart table)
    @return: view("site/Order/checkout")
    @data: $data[
                ["client"]: get data in Auth::guard("client")
                ["cart"]: get all product in cart detail order by cart.id
                ["payment"]: get all data in payment_methods table
                ["cardID"] : cart id
            ]
    */
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
        $data["cardID"] = $id;
        return view("site/Order/checkout", ["data" => $data]);
    }

    /*
    function: add (add to order, order detail, receiver table and deleted product in cart detail)
    @redirect: /site/order/addOrder
    @methods: post
    @param: Request (value to form)
    @param: $id (id cart table)
    @return: view by payment_method
    @switch(payment_method)
            payment_method == 2: view("site/Order/thankyou")
            payment_method == 1: view('site/Order/QR')
    @data: [
            $price: price sum total order
            $idOrder: id order
        ]
    */
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
        if($request->payment_method == 1){
            $order->detail = 2;
        }else{
            $order->detail = 1;
        }
        $order->save();
        // lấy id đơn hàng bản ghi mới nhất (dựa vào id tài khoản tránh trường hợp 2 tài khoản khác nhau đặt hàng cùng lúc)
        $idOrder = OrderModel::where("client_id", "=", Auth::guard("client")->user()->id)
                                ->latest()->first()->id;
        // thêm dữ liệu vào bảng Order detail
        // lấy thông tin của giỏ hàng
        $cart = Card::join("cart_detail", "cart.id", "=", "cart_detail.cart_id")
                    ->join("product_detail", "product_detail.id", "=", "cart_detail.product_detail_id")
                    ->select([
                        "cart_detail.product_detail_id", 
                        "cart_detail.quanity", 
                        "product_detail.price"
                    ])
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

        // Trừ số lượng mã giảm giá
        if(Session::has("maGiamGia")){
            $idDisCode = Session::get("maGiamGia")->id;
            $disCode = discount_code::where("isDeleted", "!=", 0)->where("id", $idDisCode)->first();
            if($disCode->quanity > 0){
                $disCode->update([
                    "updated_at" => Carbon::now(),
                    "quanity" => $disCode->quanity - 1, 
                ]);
                $disCode->save();
            }else{
                notyf()->addError("Hết lượt áp dụng mã giảm giá!!");
            }
        }

        // xem phương thức thanh toán là loại nào
        // nếu là thanh toán sau 
        if($request->payment_method == 2){
            return view("site/Order/thankyou");
        }
        // nếu là chuyển khoản -> quét QR
        if($request->payment_method == 1){

            return view('site/Order/QR', [
                "price" => $request->sumOrder,
                "idOrder" => $idOrder
            ]);
        }
    }

    /*
    function: list (show view list order)
    @redirect: /site/order/list
    @methods: get
    @return: view("site/Order/list")
    @data: get all data in order table order by Auth::guard("client")->user()->id
    */
    public function list(){
        $data['order'] = OrderModel::where("isDeleted", "!=", 0)
                                    ->where("client_id", "=", Auth::guard("client")->user()->id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        return view("site/Order/list", ["data" => $data]);
    }

    /*
    function: show (show view order detail poperties order)
    @redirect: /site/order/show
    @methods: get
    @param: $id (id order)
    @return: view("site/Order/detail")
    @data: get data in order table order by id
    */
    public function show($id){
        $data = OrderModel::join("order_detail", "order_detail.order_id", "=", "order.id")
                            ->join("receiver", "receiver.id", "=", "order.receiver_id")
                            ->join("payment_methods", "payment_methods.id", "=", "order.pay_id")
                            ->join("product_detail", "product_detail.id", "=", "order_detail.product_id")
                            ->join("product", "product_detail.product_id", "=", "product.id")
                            ->select([
                                "order.*", 
                                "order_detail.price", 
                                "product.namePro", 
                                "product_detail.color",
                                "receiver.name", 
                                "receiver.phone", 
                                "receiver.address", 
                                "receiver.sex",
                                "payment_methods.namePay",
                                "order_detail.quanity"
                            ])
                            ->where("order.isDeleted", "!=", 0)
                            ->where("order.id", "=", $id)
                            ->get();
        return view("site/Order/detail", ["data" => $data]);
    }

    /*
    function: deleted (logic and deleted order by id)
    @redirect: /site/order/deleted
    @methods: get
    @param: $id (id order)
    @return: redirect("/site/order/show/". $id)
    */
    public function deleted($id){
        // Cập nhật trạng thái huỷ đơn
        $order = OrderModel::find($id);
        if($order->status == 1){
            $order->update([
                "updated_at" => Carbon::now(),
                "status" => 0,
            ]);
            $order->save();
            // Trả số lượng về
            $product = ProductDetail::join("order_detail", "order_detail.product_id", "=", "product_detail.id")
                                    ->join("order", "order_detail.order_id", "=", "order.id")
                                    ->select([
                                        "order_detail.quanity", 
                                        "product_detail.id"
                                    ])
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
        }else{
            notyf()->addError("Huỷ đơn không thành công");
        }
        return redirect("/site/order/show/". $id);
    }

    /*
    function: thankyou (logic and deleted order by id)
    @redirect: /site/order/thankyou
    @methods: get
    @return: view("site/Order/thankyou")
    */
    public function thankyou(){
        return view("site/Order/thankyou");
    }
}
