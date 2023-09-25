<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function list(){
        if(Auth::guard("admin")->check()){
            $data["product"] = Product::join("category","category.id","=","product.cat_id")
                                      ->join("staff","product.staff_id","=","staff.id")
                                      ->join("facilities","facilities.id", "=", "facilities_id")
                                      ->select("product.*","staff.email","facilities.name","category.nameCate")
                                      ->where("product.isDeleted","!=",0)
                                      ->get();
        }
        if(Auth::guard("staff")->check()){
            $data["product"] = Product::join("category","category.id","=","product.cat_id")
            ->select("product.*","category.nameCate")
            ->where("product.isDeleted","!=",0)
            ->get();
        }
        return view("admin/Product/product-list", ["data" => $data["product"]]);
    }
    public function addView(){
        $category = Category::all()->where("isDeleted", "!=", 0);
        return view("admin/Product/product-add", ['data' => $category]);
    }

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
            return redirect()->route("addProduct");
        }

        $product->save();

        return redirect()->route("listProduct");
    }

    public function edit($id){
        $data["product"] = Product::where("id",$id)->where("isDeleted","!=",0)->first();
        $data["category"] = Category::all()->where("isDeleted","!=",0);
        return view("admin/Product/product-edit", ["data" => $data]);
    }

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
        return redirect()->route("listProduct");
    }
}
