<?php

namespace App\Http\Controllers\site;

use App\Models\CardDetail;
use App\Models\Category;
use App\Models\CommentModel;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /*
    function: list (get list product site view)
    @redirect: /site/product/list
    @methods: get
    @return: view("site/Product/product-list")
    @data: $data[
                ['category']: get all data in category table
                ['soluong']: get count product sreach
                ['product']: get all product sreach
                ['countCart'] : get count cart order by Auth::guard("client")->user()->id
            ]
    */
    public function list(){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['soluong'] = ProductDetail::where("isDeleted", "!=", 0)->where("isSoid","!=",0)->count();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->select("product_detail.*", "product.namePro")
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->where("product_detail.isSoid","!=",0)
                                        ->orderBy('product_detail.created_at', 'desc')
                                        ->paginate(12);
        if(Auth::guard("client")->check()){
            $data['countCart'] = CardDetail::join("cart", "cart.id", "=", "cart_detail.cart_id")
                                        ->where("cart.client_id", "=", Auth::guard("client")->user()->id)
                                        ->count();
        }
        // san pham yeu thich
        return view("site/Product/product-list", ['data' => $data]);
    }

    /*
    function: show (show view product detail poperties site view)
    @redirect: /site/product/show
    @methods: get
    @param: $id (id product detail)
    @return: view("site/Product/product-detail")
    @data: $data[
                ['category']: get all data in category table
                ['product']: get all product sreach
                ['product3']: get 3 product
                ['comment']: get comment in product detail
            ]
    */
    public function show($id){
        $data['category'] = Category::where("isDeleted", "!=", 0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->join("category", "category.id", "=", "product.cat_id")
                                        ->select([
                                            "product_detail.*", 
                                            "product.namePro", 
                                            "category.nameCate", 
                                            "category.id AS cateID"
                                        ])
                                        ->where("product_detail.id", "=", $id)->first();
        $data['product3'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->select([
                                            "product_detail.*", 
                                            "product.namePro"
                                        ])
                                        ->where("product.cat_id","=", $data['product']->cateID)
                                        ->limit(3)->get();
        $data['comment'] = CommentModel::join("client", "client.id","=","comment.client_id")
                                        ->select([
                                            "comment.*",
                                            "client.name"
                                        ])
                                        ->where("comment.isDeleted", "!=", 0)
                                        ->where("comment.product_detail_id", "=", $id)
                                        ->get();
        return view("site/Product/product-detail" , ["data" => $data]);
    }

    /*
    function: selectCategory (show view product detail poperties site view)
    @redirect: /site/category/list
    @methods: get
    @param: $id (id category table)
    @return: view("site/Product/product-list")
    @data: $data[
                ['category']: get all data in category table
                ['soluong']: get count product sreach
                ['product']: get all product sreach
                ['countCart'] : get count cart order by Auth::guard("client")->user()->id
            ]
    */
    public function selectCategory($id){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['soluong'] = ProductDetail::join("product","product_detail.product_id","=","product.id")
                                        ->join("category","category.id","=","product.cat_id")
                                        ->where("product_detail.isDeleted","!=", 0)
                                        ->where("product.cat_id","=",$id)
                                        ->count();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->join("category","category.id","=","product.cat_id")
                                        ->select([
                                            "product_detail.*", 
                                            "product.namePro"
                                        ])
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->where("product.cat_id", "=", $id)
                                        ->paginate(12);
        if(Auth::guard("client")->check()){
            $data['countCart'] = CardDetail::join("cart", "cart.id", "=", "cart_detail.cart_id")
                                        ->where("cart.client_id", "=", Auth::guard("client")->user()->id)
                                        ->count();
        }
        return view("site/Product/product-list", ["data" => $data]);
    }
}
