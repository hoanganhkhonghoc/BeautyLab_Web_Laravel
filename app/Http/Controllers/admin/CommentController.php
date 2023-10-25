<?php

namespace App\Http\Controllers\admin;

use App\Models\CommentModel;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /*
    function: list (show view list manager Comment)
    @redirect: /admin/comment/list
    @methods: get
    @return: view("admin/Comment/comment_list")
    @data: get all comment in comment table and isDeleted != 0
    */
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
                                        ->orderBy('comment.created_at', 'desc')
                                        ->get();
        return view("admin/Comment/comment_list", ["data" => $data]);
    }
}
