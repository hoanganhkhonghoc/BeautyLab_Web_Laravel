<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\discount_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiscountCodeController extends Controller
{
    public function useCode(Request $request,$cartId){
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
