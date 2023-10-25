<?php

namespace App\Http\Controllers\site;

use App\Models\discount_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class DiscountCodeController extends Controller
{
    /*
    function: useCode (logic and check use code in discount code table)
    @redirect: /site/disCode/useCode
    @methods: post
    @param: Request (value to form)
    @param: $cartId (id cart table)
    @return: redirect("/site/order/index/" . $cartId)
    */
    public function useCode(Request $request, $cartId){
        $code = $request->coupon_code;
        // tìm kiếm bản ghi có mã code trùng
        $discountCode = discount_code::where("isDeleted", "!=", 0)
                                    ->where("code", $code)->first();
        // kiểm tra xem có tồn tại không ?
        if($discountCode != null){
            if($discountCode->quanity > 0){
                Session::put("maGiamGia", $discountCode);
                notyf()->addSuccess("Áp dụng mã giảm giá thành công!!");
                return redirect("/site/order/index/" . $cartId);
            }else{
                notyf()->addError("Hết lượt áp dụng mã giảm giá!!");
                return redirect("/site/order/index/" . $cartId);
            }
        }else{
            notyf()->addError("Mã giảm giá không hợp lệ!!");
            return redirect("/site/order/index/" . $cartId);
        }
    }
}
