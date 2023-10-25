<?php

namespace App\Http\Controllers\site;

use App\Models\BaiVietModel;
use App\Http\Controllers\Controller;

class BaiVietController extends Controller
{
    /*
    function: list (show view list blog)
    @redirect: /site/baiviet/list
    @methods: get
    @return: view("site/BaiViet/list")
    @data: get all data in post table and isDeleted != 0
    */
    public function list(){
        $data = BaiVietModel::where("isDeleted", "!=", 0)
                            ->orderBy('created_at', 'desc')
                            ->paginate(8);
        return view("site/BaiViet/list" , ["data" => $data]);
    }

    /*
    function: show (show view post detail blog)
    @redirect: /site/baiviet/show
    @methods: get
    @return: view by postNumber
    @switch(postNumber)
            postNumber == 1: return view("admin/BaiViet/View1Show")
            postNumber == 2: return view("admin/BaiViet/View2Show")
            default: return view("admin/BaiViet/View1Show")
    @data: get data in post table order by id
    */
    public function show($id){
        $data = BaiVietModel::where("isDeleted", "!=", 0)
                                    ->where("id", "=", $id)->first();
        if($data->postNumber == 1){
            return view("admin/BaiViet/View1Show", ["data" => $data]);
        }else if($data->postNumber == 2){
            return view("admin/BaiViet/View2Show", ["data" => $data]);
        }else{
            return view("admin/BaiViet/View1Show", ["data" => $data]);
        }
    }
}
