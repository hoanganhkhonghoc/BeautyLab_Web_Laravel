<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function show(){
        if(Auth::guard("client")->check()){
            $count = Card::where("isDeleted", "!=", 0)->where("client_id", Auth::guard("client")->user()->id)->count();
            // trường hợp 1; tài khoản chưa có giỏ hàng
            if($count == 0){
                $cart = new Card();
                $cart->created_at = Carbon::now();
                $cart->updated_at = Carbon::now();
                $cart->client_id = Auth::guard("client")->user()->id;
                $cart->isDeleted = 1;
                $cart->save();
            }
            // trường hợp 2: tài khoản đã có giỏ hàng
            $data['cart'] = Card::join("cart_detail", "cart_detail.cart_id", "=", "cart.id")
                                ->join("product_detail", "product_detail.id", "=", "cart_detail.product_detail_id")
                                ->join("product", "product.id", "=", "product_detail.product_id")
                                ->select("cart_detail.*", "product_detail.img","product_detail.price","product_detail.color","product_detail.id as product_id", "product.namePro")
                                ->where("cart_detail.isDeleted","!=",0)
                                ->where("product_detail.isDeleted","!=",0)
                                ->where("product_detail.isSoid","!=",0)
                                ->paginate(12);
            return view("site/Cart/cart-list", ["data" => $data]);
        }
        return redirect("/login/showView");
    }
}
