<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    // trang chủ khi phân quyền xong
    public function index(){
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();

        // Truy vấn các bản ghi trong bảng "order" được tạo trong tháng hiện tại
        $data["countOrderInMonth"] = OrderModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $data["sumPriceOrderInMonth"] = OrderModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('sum');
        $data["countOrderLastMonth"] = OrderModel::whereBetween('created_at', [$lastMonthStart, $lastMonthStart->endOfMonth()])->count();
        $data["tanglen"] = 0;
        if( $data["countOrderInMonth"] - $data["countOrderLastMonth"] >= 0){
            $data["tanglen"] = $data["countOrderInMonth"] - $data["countOrderLastMonth"];
        }
        $data['giamdi'] = 0;
        if($data["countOrderLastMonth"] - $data["countOrderInMonth"]  >= 0){
            $data["giamdi"] = $data["countOrderLastMonth"] - $data["countOrderInMonth"];
        }

        $data['product5limit'] = ProductDetail::select(
            'product_detail.id',
            'product_detail.img',
            'product.namePro',
            'product_detail.color',
            DB::raw('SUM(order_detail.quanity) as total_sold'),
            DB::raw('MAX(product_detail.created_at) as created_at')
        )
            ->join('order_detail', 'product_detail.id', '=', 'order_detail.product_id')
            ->join('order', 'order_detail.order_id', '=', 'order.id')
            ->join('product', 'product_detail.product_id', '=', 'product.id')
            ->where('order.isDeleted', '!=', 0)
            ->whereBetween('order.created_at', [$startOfMonth, $endOfMonth])
            ->groupBy([
                'product_detail.id', 
                'product_detail.img', 
                'product.namePro', 
                'product_detail.color'
            ])
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
        return view("admin/Dashbroad/dashbroad", ["data" => $data]);
    }

    public function account(){
        $data = [];
        if(Auth::guard("admin")->check()){
            $data = Auth::guard('admin')->user();
        }
        if(Auth::guard("staff")->check()){
            $data = Auth::guard('staff')->user();
        }
        return view("admin/Account/account-show", ["data" => $data]);
    }
}
