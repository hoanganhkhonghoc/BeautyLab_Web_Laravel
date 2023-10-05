<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['soluong'] = ProductDetail::where("isDeleted", "!=", 0)->where("isSoid","!=",0)->count();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->select("product_detail.*", "product.namePro")
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->where("product_detail.isSoid","!=",0)
                                        ->paginate(12);
        // san pham yeu thich
        return view("site/Product/product-list", ['data' => $data]);
    }

    public function show($id){
        $data['category'] = Category::where("isDeleted", "!=", 0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->join("category", "category.id", "=", "product.cat_id")
                                        ->select("product_detail.*", "product.namePro", "category.nameCate", "category.id AS cateID")
                                        ->where("product_detail.id", "=", $id)->first();
        $data['product3'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->select("product_detail.*", "product.namePro")
                                        ->where("product.cat_id","=", $data['product']->cateID)
                                        ->limit(3)->get();
        return view("site/Product/product-detail" , ["data" => $data]);
    }

    public function selectCategory($id){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['soluong'] = ProductDetail::join("product","product_detail.product_id","=","product.id")
                                        ->join("category","category.id","=","product.cat_id")
                                        ->where("product_detail.isDeleted","!=", 0)
                                        ->where("product.cat_id","=",$id)
                                        ->count();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->join("category","category.id","=","product.cat_id")
                                        ->select("product_detail.*", "product.namePro")
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->where("product.cat_id", "=", $id)
                                        ->paginate(12);
        return view("site/Product/product-list", ["data" => $data]);
    }
}
