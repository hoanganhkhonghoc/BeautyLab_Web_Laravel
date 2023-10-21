<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardDetail;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                                ->select([
                                    "cart_detail.*", 
                                    "product_detail.img",
                                    "product_detail.price",
                                    "product_detail.color",
                                    "product_detail.id as product_id", 
                                    "product.namePro"
                                ])
                                ->where("cart.client_id", "=", Auth::guard("client")->user()->id)
                                ->where("cart_detail.isDeleted","!=",0)
                                ->where("product_detail.isDeleted","!=",0)
                                ->where("product_detail.isSoid","!=",0)
                                ->orderBy('cart.updated_at', 'desc')
                                ->paginate(12);
            $data['Idcart'] = Card::where("client_id", "=", Auth::guard("client")->user()->id)->first();
            return view("site/Cart/cart-list", ["data" => $data]);
        }
        return redirect("/login/showView");
    }

    // thêm sản phẩm vào giỏ hàng trong view product detail
    public function addCartDetail(Request $request, $id){
        if(Auth::guard("client")->check()){
            if($this->checkProductInCart($id)){
                // đã có sản phẩm trong giỏ hàng
                // update số lượng 
                // Lấy số lượng sản phẩm có trong giỏ hàng
                $quanityCurrent = $this->getCountProductInCart($id);
                // lấy số lượng vừa thêm vào
                $updatedQuantity = $request->qty;
                // tổng số lượng mới
                $sum = $quanityCurrent + $updatedQuantity;
                // lấy số lượng sản phẩm thực tế còn trong kho
                $quanityProductMax = $this->getCoutProductInProduct($id);
                // nếu tổng số lượng mới <= số lượng có sản phẩm trong kho -> số lượng mới giữ nguyên 
                // nếu tổng số lượng mới > số lượng có trong kho -> giỏ hàng chỉ chứa tối đa số lượng sản phẩm có trong kho 
                if($sum <= $quanityProductMax){
                    
                }else{
                    $sum = $quanityProductMax;
                }

                DB::table('cart_detail')
                    ->join('cart', 'cart_detail.cart_id', '=', 'cart.id')
                    ->where('cart.client_id', '=', Auth::guard('client')->user()->id)
                    ->where('cart_detail.product_detail_id', '=', $id)
                    ->update(['quanity' => $sum]);
                notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                return redirect()->back();
            }else{
                // chưa có sản phẩm 
                // thêm mới sản phẩm vào giỏ hàng
                $this->addNewProductInCart($id, $request->qty);
                notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                return redirect()->back();
            }
        }
    }

    private function checkProductInCart($idProduct){
        // hàm này sẽ trả true hoặc false
        // trua khi sản phẩm đã có trong giỏ hàng
        // false khi sản phẩm chưa có trong giỏ hàng
        $count = Card::join("cart_detail", "cart_detail.cart_id", "=", "cart.id")
                        ->where("cart_detail.product_detail_id", "=", $idProduct)
                        ->where("cart.client_id", "=", Auth::guard("client")->user()->id)
                        ->count();
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }

    private function getCountProductInCart($idProduct){
        $cart = CardDetail::join("cart", "cart_detail.cart_id", "=", "cart.id")
                                ->where("cart.client_id", "=", Auth::guard("client")->user()->id)
                                ->where("cart_detail.product_detail_id", "=", $idProduct)
                                ->first();
        return $cart->quanity;
    }

    private function getCoutProductInProduct($idProduct){
        $product = ProductDetail::where("id", "=", $idProduct)->where("isDeleted", "!=", 0)->first();
        return $product->quanity;
    }

    private function addNewProductInCart($idProduct, $quanityAdd){
        $cart = Card::where("client_id", "=", Auth::guard("client")->user()->id)->first();
        $cart_detail = new CardDetail();
        $cart_detail->cart_id = $cart->id;
        $cart_detail->product_detail_id = $idProduct;
        $cart_detail->quanity = $quanityAdd;
        $cart_detail->created_at = Carbon::now();
        $cart_detail->updated_at = Carbon::now();
        $cart_detail->isDeleted = 1;
        $cart_detail->save();
    }

    public function addCartList($id, $quanity){
        $idProduct = $id;
        $quanityAdd = $quanity;
        if(Auth::guard("client")->check()){
            if($this->checkProductInCart($id)){
                // đã có sản phẩm trong giỏ hàng
                // update số lượng 
                // Lấy số lượng sản phẩm có trong giỏ hàng
                $quanityCurrent = $this->getCountProductInCart($idProduct);
                // lấy số lượng vừa thêm vào
                $updatedQuantity = $quanityAdd;
                // tổng số lượng mới
                $sum = $quanityCurrent + $updatedQuantity;
                // lấy số lượng sản phẩm thực tế còn trong kho
                $quanityProductMax = $this->getCoutProductInProduct($idProduct);
                // nếu tổng số lượng mới <= số lượng có sản phẩm trong kho -> số lượng mới giữ nguyên 
                // nếu tổng số lượng mới > số lượng có trong kho -> giỏ hàng chỉ chứa tối đa số lượng sản phẩm có trong kho 
                if($sum <= $quanityProductMax){
                    
                }else{
                    $sum = $quanityProductMax;
                }

                DB::table('cart_detail')
                    ->join('cart', 'cart_detail.cart_id', '=', 'cart.id')
                    ->where('cart.client_id', '=', Auth::guard('client')->user()->id)
                    ->where('cart_detail.product_detail_id', '=', $idProduct)
                    ->update(['quanity' => $sum]);
                notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                return redirect()->back();
            }else{
                // chưa có sản phẩm 
                // thêm mới sản phẩm vào giỏ hàng
                $this->addNewProductInCart($idProduct, $quanityAdd);
                notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                return redirect()->back();
            }
        }
    }

    public function xl_deleted($idPro, $idCart){
        DB::table("cart_detail")->where("cart_id", "=", $idCart)
                                ->where("product_detail_id", "=", $idPro)
                                ->delete();
        notyf()->addSuccess("Xoá thành công !!");
        return redirect()->back();                       
    }

    /* xem kĩ phần này 2h -> 3h trong rec */ 
    /* xem kĩ phút 2h38-2h44 */
    public function updateCart(Request $request, $idCart){
        $arrQuanity = $request->input('quanity');

        if (is_array($arrQuanity) || is_object($arrQuanity)) {
            foreach ($arrQuanity as $product_id => $quanityUpdate) {
                $quanityCurrent = ProductDetail::where("id", $product_id)->first()->quanity;
                $quanityFinis = 0;
                if($quanityUpdate <= $quanityCurrent){
                    $quanityFinis = $quanityUpdate;
                }else{
                    notyf()->position('x', 'center')
                            ->position('y', 'top')
                            ->addWarning("Hiện tại sản phẩm này chỉ còn " . $quanityCurrent);
                    $quanityFinis = $quanityCurrent;
                }
                // update số lượng cho cart detail
                DB::table("cart_detail")->where("cart_id", "=", $idCart)
                                        ->where("product_detail_id", "=", $product_id)
                                        ->update([
                                            "updated_at" => Carbon::now(),
                                            "quanity"    => $quanityFinis,
                                        ]);
            }
        }
        notyf()->addSuccess("Cập nhật thành công !!");
        return redirect()->back();  
    }
}
