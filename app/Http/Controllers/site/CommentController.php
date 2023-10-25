<?php

namespace App\Http\Controllers\site;

use Carbon\Carbon;
use App\Models\CommentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /*
    function: addCartDetail (logic and add cart to cart detail table)
    @redirect: /site/comment/add
    @methods: post
    @param: Request (value to form)
    @param: $id (id product detail table)
    @return: return redirect()->back()
    */
    public function xl_add(Request $request,$id){
        $comment = new CommentModel();
        if(Auth::guard("client")->check()){
            $comment->client_id = Auth::guard("client")->user()->id;
            $comment->product_detail_id = $id;
            $comment->content = $request->msg;
            $comment->created_at = Carbon::now();
            $comment->updated_at = Carbon::now();
            $comment->isDeleted = 1;
            $comment->date = Carbon::now();
            $comment->save();
        }
        notyf()->addSuccess("Đăng bình luận thành công !!");
        return back();
    }
}
