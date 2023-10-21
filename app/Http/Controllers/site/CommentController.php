<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
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
