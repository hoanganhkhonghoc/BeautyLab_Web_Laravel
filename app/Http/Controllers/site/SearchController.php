<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\CardDetail;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
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
