<?php
namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\OrderModel;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    /*
    function: index (show view dashbroad admin)
    @redirect: /admin/home/index
    @methods: get
    @param: $year (year param)
    @return: view("admin/Dashbroad/dashbroad")
    @data: $data[
                ["countOrderInMonth"]: count order in month
                ["sumPriceOrderInMonth"]: sum price order in month
                ["countOrderLastMonth"]: count order last month
                ["tanglen"]: The number of orders is more than last month
                ["giamdi"]: The number of orders decreased compared to the previous month
                ["priceOfmothByYear"]: Revenue every month of the year
                ['product5limit']: Top 5 best selling products of the month
            ]
    @data: $year: year param
    */
    public function index($year){
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();

        // Truy vấn các bản ghi trong bảng "order" được tạo trong tháng hiện tại
        $data["countOrderInMonth"] = OrderModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                                                ->where("isDeleted", "!=", 0)
                                                ->count();
        $data["sumPriceOrderInMonth"] = OrderModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                                                ->where("isDeleted", "!=", 0)
                                                ->sum('sum');
        $data["countOrderLastMonth"] = OrderModel::whereBetween('created_at', [$lastMonthStart, $lastMonthStart->endOfMonth()])
                                                ->where("isDeleted", "!=", 0)
                                                ->count();
        $data["tanglen"] = 0;
        if( $data["countOrderInMonth"] - $data["countOrderLastMonth"] >= 0){
            $data["tanglen"] = $data["countOrderInMonth"] - $data["countOrderLastMonth"];
        }
        $data['giamdi'] = 0;
        if($data["countOrderLastMonth"] - $data["countOrderInMonth"]  >= 0){
            $data["giamdi"] = $data["countOrderLastMonth"] - $data["countOrderInMonth"];
        }

        // Lấy doanh thu trong năm
        $data["priceOfmothByYear"] = [];
        for ($i = 1; $i <= 12; $i++) {
            $startOfMonthTK = Carbon::createFromDate($year, $i, 1)->startOfMonth();
            $endOfMonthTK = Carbon::createFromDate($year, $i, 1)->endOfMonth();
            
            $revenue = DB::table('order')
                ->whereBetween('created_at', [$startOfMonthTK, $endOfMonthTK])
                ->where("isDeleted", "!=", 0)
                ->sum('sum');
            $data["priceOfmothByYear"][$i] = intval($revenue);
        }
        // Thừa còn hơn thiếu
        if (Session::has('year')) {
            Session::put('year', Carbon::now()->year);
        } else {
            Session::put('year', Carbon::now()->year);
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
        return view("admin/Dashbroad/dashbroad",    [
                                                        "data" => $data,
                                                        "year" => $year,
                                                    ]);
    }

    /*
    function: account (show view account show admin)
    @redirect: /admin/account/show
    @methods: get
    @return: view("admin/Account/account-show")
    @data: $data: data Auth
    */
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
