<?php

namespace App\Http\Controllers\site;

use App\Models\Category;
use App\Models\CardDetail;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /*
    function: search (search product)
    @redirect: /site/search
    @methods: post
    @param: Request (value to form)
    @return: view("site/Product/product-list")
    @data: $data[
                ['category']: get all data in category table
                ['soluong']: get count product sreach
                ['product']: get all product sreach
                ['countCart'] : get count cart order by Auth::guard("client")->user()->id
            ]
    */
    public function search(Request $request){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['soluong'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->where("product_detail.isSoid","!=",0)
                                        ->where('product.namePro', 'like', "%$request->key%")
                                        ->count();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->select("product_detail.*", "product.namePro")
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->where("product_detail.isSoid","!=",0)
                                        ->where('product.namePro', 'like', "%". $request->key ."%")
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
}
