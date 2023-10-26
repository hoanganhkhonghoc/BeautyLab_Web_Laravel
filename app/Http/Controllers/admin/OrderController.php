<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\OrderModel;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /*
    function: list (show view list order)
    @redirect: /admin/order/list
    @methods: get
    @return: view("admin/Order/order-list")
    @data: get all data in order table where isDeleted != 0
    */
    public function list(){
        // lấy toàn bộ đơn hàng
        $data['order'] = OrderModel::where("isDeleted", "!=", 0)
                                    ->orderBy('created_at', 'asc')
                                    ->get();
        return view("admin/Order/order-list", ["data" => $data]);
    }

    /*
    function: show (show view detail poperties order)
    @redirect: /admin/order/show
    @methods: get
    @param: $id (id order)
    @return: view("admin/Order/order-detail")
    @data: $data[
                ["order"]: get value order table order by id
                ['product']: get all product detail table order by id order_detail.product_id
            ]
    */
    public function show($id){
        // lấy thông tin của 1 đơn hàng bất kì
        $data["order"] = OrderModel::join("receiver", "order.receiver_id", "=", "receiver.id")
                                    ->join("payment_methods", "payment_methods.id", "=", "order.pay_id")
                                    ->select([
                                        "order.*", 
                                        "payment_methods.namePay", 
                                        "receiver.name", 
                                        "receiver.phone", 
                                        "receiver.address"
                                    ])
                                    ->where("order.isDeleted", "!=", 0)
                                    ->where("order.id", "=", $id)
                                    ->first();
        $data['product'] = OrderModel::join("order_detail", "order_detail.order_id", "=", "order.id")
                                    ->join("product_detail", "product_detail.id", "=", "order_detail.product_id")
                                    ->join("product", "product.id", "=", "product_detail.product_id")
                                    ->select([
                                        "product_detail.img", 
                                        "product.namePro", 
                                        "order_detail.quanity", 
                                        "order_detail.price", 
                                        "product_detail.color", 
                                        "product_detail.id"
                                    ])
                                    ->where("order.isDeleted", "!=", 0)
                                    ->where("order.id", "=", $id)
                                    ->get();
        return view("admin/Order/order-detail", ["data" => $data]);
    }

    /*
    function: update (logic and update value in order table)
    @redirect: /admin/order/updateOrder
    @methods: post
    @param: Request (value to form)
    @param: $id (id order)
    @return: back()->redirect()
    */
    public function update(Request $request,$id){
        $order = OrderModel::where("id", "=", $id)->where("isDeleted", "!=", 0)->first();
        $statusCurrent = $order->status;

        // kiểm tra status định chuyển 
        // nếu chuyển tuyến tức là (từ 1-> 3) -> không cần quan tâm
        if($statusCurrent > 0 && $statusCurrent < 3){
            // đang nằm trong khoảng 1 -> 3
            if($statusCurrent < $request->status){
                $order->update([
                    "updated_at" => Carbon::now(),
                    "status" => $request->status,
                ]);
                $order->save();
                notyf()->addSuccess("Thay đổi trạng thái thành công !!");
                return back();
            }
        }
        // nếu huỷ (1 -> 0) -> còn phải xử lý hoàn lại số lượng sản phẩm
        // làm chức năng huỷ sản phẩm ở đây
        if($statusCurrent == 1 && $request->status == 0)
        {
            $this->deleteOrder($id);
            return back();
        }
    }

    /*
    function: deleteOrder (logic and update value in order table)
    @redirect: /admin/order/deleteOrder
    @methods: get
    @param: $id (id order)
    */
    public function deleteOrder($id){
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
                                        "product_detail.id",
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
            notyf()->addError("Huỷ đơn không thành công thành công");
            
        }
    }

    /*
    function: SelectedOrder (selected status current in order table)
    @redirect: /admin/order/SelectedOrder
    @methods: get
    @param: $status (status current order)
    @return: view("admin/Order/order-list")
    @data: get all data order table order by status
    */
    public function SelectedOrder($status){
        // $count -> 1 chờ xử lý (chưa xử lý), 2 đang giao hàng, 3 đã giao thành công, 0 là đã huỷ
        $data['order'] = OrderModel::where("isDeleted", "!=", 0)->where("status", "=", $status)->get();
        return view("admin/Order/order-list", ["data" => $data]);
    }

    /*
    function: selectedOrderByMethods (selected order by methods)
    @redirect: /admin/order/selectedOrderByMethods
    @methods: get
    @param: $methods (methods current order)
    @return: view("admin/Order/order-list")
    @data: get all data order table order by status
    */
    public function selectedOrderByMethods($methods){
        $data['order'] = OrderModel::where("isDeleted", "!=", 0)
                                    ->where("pay_id", "=", $methods)
                                    ->get();
        return view("admin/Order/order-list", ["data" => $data]);                           
    }
}
