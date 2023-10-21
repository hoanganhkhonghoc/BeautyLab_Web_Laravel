<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Like;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function list($id){
        $data['category'] = Category::where("isDeleted", "!=", 0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->join("category","category.id","=","product.cat_id")
                                        ->join("like", "like.product_detail_id", "=", "product_detail.id")
                                        ->join("client", "client.id", "=", "like.client_id")
                                        ->select([
                                            "product_detail.*", 
                                            "product.namePro"
                                        ])
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->where("like.isDeleted", "!=", 0)
                                        ->where("client.id", "=", $id)
                                        ->orderBy('like.created_at', 'desc')
                                        ->paginate(12);
                                        // dd($data);
        return view("site/Product/like-list", ['data' => $data]);
    }

    // id la id cua Product_detail
    public function add($id){
        if(Auth::guard("client")->check()){
            $dk = Like::where("isDeleted", "!=", 0)
                        ->where("product_detail_id", "=", $id)
                        ->where("client_id", "=", Auth::guard("client")->user()->id)
                        ->count();
            // lấy đối tượng chứa id
            $idLike = Like::where("isDeleted", "!=", 0)
                        ->where("client_id","=", Auth::guard("client")->user()->id)
                        ->where("product_detail_id", "=", $id)
                        ->first();
            if($dk > 0){
            // trường hợp 1, sản phẩm đã trong danh sách yêu thích
                $like = Like::find($idLike->id);
                $like->delete();
                notyf()->addSuccess("Đã xoá thành công khỏi danh sách yêu thích !");
                return back();
            }else{
            // trường hợp 2, sản phẩm chưa có trong danh sách yêu thích
                $like = new Like();
                $like->created_at = Carbon::now();
                $like->isDeleted = 1;
                $like->client_id = Auth::guard("client")->user()->id;
                $like->product_detail_id = $id;
                $like->save();
                notyf()->addSuccess("Đã yêu thích sản phẩm !");
                return back();
            }
        }
        return redirect("/login/showView");
    }
}
