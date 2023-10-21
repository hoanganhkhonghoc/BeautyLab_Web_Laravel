<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function list(){
        $data["comment"] = CommentModel::join("product_detail", "comment.product_detail_id", "=", "product_detail.id")
                                        ->join("product", "product.id", "=", "product_detail.product_id")
                                        ->join("client", "client.id", "=", "comment.client_id")
                                        ->select([
                                            "comment.*",
                                            "product.namePro",
                                            "product_detail.img",
                                            "client.name",
                                            "client.phone",
                                            "client.email",
                                            "product_detail.id as Pro_id"
                                        ])
                                        ->where("product_detail.isDeleted", "!=", 0)
                                        ->get();
        return view("admin/Comment/comment_list", ["data" => $data]);
    }
}
