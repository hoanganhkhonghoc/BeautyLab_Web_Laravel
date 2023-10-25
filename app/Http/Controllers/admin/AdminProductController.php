<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    /*
    function: list (show view list manager product)
    @redirect: /admin/product/list
    @methods: get
    @return: view("admin/Product/product-list")
    @data: $data["product"]: get all data in table product where (product.isDelted != 0)
    */
    public function list(){
        if(Auth::guard("admin")->check()){
            $data["product"] = Product::join("category","category.id","=","product.cat_id")
                                      ->join("staff","product.staff_id","=","staff.id")
                                      ->join("facilities","facilities.id", "=", "facilities_id")
                                      ->select("product.*","staff.email","facilities.name","category.nameCate")
                                      ->where("product.isDeleted","!=",0)
                                      ->orderBy('product.created_at', 'desc')
                                      ->get();
        }
        if(Auth::guard("staff")->check()){
            $idCoSo = Auth::guard("staff")->user()->facilities_id;
            
            $data["product"] = Product::join("category","category.id","=","product.cat_id")
            ->join("staff","product.staff_id","=","staff.id")
            ->join("facilities","facilities.id", "=", "facilities_id")
            ->select("product.*","category.nameCate")
            ->where("product.isDeleted","!=",0)
            ->where("staff.facilities_id", "=", $idCoSo)
            ->orderBy('product.created_at', 'desc')
            ->get();
        }
        return view("admin/Product/product-list", ["data" => $data["product"]]);
    }

    /*
    function: addView (show view add manager product)
    @redirect: /admin/product/addView
    @methods: get
    @return: view("admin/Product/product-add")
    @data: get all data in table category where (isDelted != 0)
    */
    public function addView(){
        $category = Category::all()->where("isDeleted", "!=", 0);
        return view("admin/Product/product-add", ['data' => $category]);
    }

    /*
    function: xl_add (logic and add value form view to database)
    @redirect: /admin/product/xl_add
    @methods: post
    @param: Request (value to form)
    @return: redirect("/admin/product/list")
    */
    public function xl_add(Request $request){
        $validate = $request->validate([
            "namePro" => "required|string|max:255",
            "cat_id"  => "required|int"
        ]);
        if(Auth::guard("admin")->check()){
            $staff_id = 1;
        }else{
            $staff_id = Auth::guard("staff")->user()->id;
        }
        $product = new Product();

        $nameProTrim = trim($validate['namePro']);
        $product->namePro = $nameProTrim;

        $product->cat_id = $validate['cat_id'];
        $product->staff_id = $staff_id;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->isDeleted = $request->isDeleted;

        $checkNameProduct = Product::where("namePro",$product->namePro)->count();

        if($checkNameProduct != 0){
            notyf()->addError("Thêm sản phẩm thất bại!!");
            return redirect()->route("addProduct");
        }

        $product->save();

        notyf()->addSuccess("Thêm sản phẩm thành công");
        return redirect()->route("listProduct");
    }

    /*
    function: edit (show view edit product)
    @redirect: /admin/product/editView
    @methods: get
    @param: $id (id table product)
    @return: view("admin/Product/product-edit")
    @data: $data[
                ["product"]: get data order by id table product
                ["category"]: get all data in table category
            ]
    */
    public function edit($id){
        $data["product"] = Product::where("id",$id)->where("isDeleted","!=",0)->first();
        $data["category"] = Category::all()->where("isDeleted","!=",0);
        return view("admin/Product/product-edit", ["data" => $data]);
    }

    /*
    function: xl_edit (logic and edit data where id in table product)
    @redirect: /admin/product/xl_edit
    @methods: post
    @param: Request (value to form)
    @param: $id (id table product)
    @return: redirect("/admin/product/list")
    */
    public function xl_edit(Request $request, $id){
        if(Auth::guard("admin")->check()){
            $staff_id = 1;
        }else{
            $staff_id = Auth::guard("staff")->user()->id;
        }
        $product = Product::find($id);
        $nameProTrim = trim($request->namePro);
        $checkNameProduct = Product::where("namePro",$nameProTrim)->count();
        if($checkNameProduct > 1){
            notyf()->addError("Sửa sản phẩm thất bại!!");
            return redirect("/admin/product/editView/" . $id);
        }else if($checkNameProduct == 1){
            $product->update([
                "staff_id" => $staff_id,
                "cat_id" => $request->cat_id,
                "updated_at" => Carbon::now(),
                "isDeleted" => $request->isDeleted,
            ]);
        }else{
            $product->update([
                "namePro" => $nameProTrim,
                "staff_id" => $staff_id,
                "cat_id" => $request->cat_id,
                "updated_at" => Carbon::now(),
                "isDeleted" => $request->isDeleted,
            ]);
        }
        $product->save();
        notyf()->addSuccess("Sửa sản phẩm thành công");
        return redirect()->route("listProduct");
    }


    /*
    function: selectProductMax (logic and edit data where id in table product)
    @redirect: /admin/count/
    @methods: get
    @param: $count (0 or 10)
    @return: view("admin/Product/product-list")
    @data: $data['product']: get all data product if quanity <= 10 or quanity = 0
    */
    public function selectProductMax($count){
        // biến count sẽ là điều kiện lọc <10 hay =0
        if($count == 10){
            $productCount = Product::where('isDeleted', '!=', 0)
            ->whereHas('productDetails', function ($query) use ($count) {
                $query->where('isDeleted', '!=', 0)
                    ->groupBy('product_id')
                    ->havingRaw('SUM(quanity) <= ?', [$count])
                    ->havingRaw('SUM(quanity) > 0');
            })
            ->pluck('id');
        }else{
            $productCount = Product::where('isDeleted', '!=', 0)
            ->whereHas('productDetails', function ($query) use ($count) {
                $query->where('isDeleted', '!=', 0)
                    ->groupBy('product_id')
                    ->havingRaw('SUM(quanity) = 0');
            })
            ->pluck('id');
        }
        if(Auth::guard("admin")->check()){
            $data["product"] = Product::join("category","category.id","=","product.cat_id")
                                      ->join("staff","product.staff_id","=","staff.id")
                                      ->join("facilities","facilities.id", "=", "facilities_id")
                                      ->select([
                                        "product.*",
                                        "staff.email",
                                        "facilities.name",
                                        "category.nameCate",
                                      ])
                                      ->where("product.isDeleted","!=",0)
                                      ->whereIn("product.id", $productCount)
                                      ->get();
        }
        if(Auth::guard("staff")->check()){
            $idCoSo = Auth::guard("staff")->user()->facilities_id;
            
            $data["product"] = Product::join("category","category.id","=","product.cat_id")
            ->join("staff","product.staff_id","=","staff.id")
            ->join("facilities","facilities.id", "=", "facilities_id")
            ->select([
                "product.*",
                "category.nameCate"
            ])
            ->where("product.isDeleted","!=",0)
            ->where("staff.facilities_id", "=", $idCoSo)
            ->whereIn("product.id", $productCount)
            ->get();
        }
        return view("admin/Product/product-list", ["data" => $data["product"]]);
    }
}
