<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\BaiVietModel;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function list(){
        $data = BaiVietModel::where("isDeleted", "!=", 0)
                            ->orderBy('created_at', 'desc')
                            ->paginate(8);
        // dd($data);
        return view("site/BaiViet/list" , ["data" => $data]);
    }
    public function show($id){
        $data = BaiVietModel::where("isDeleted", "!=", 0)
                                    ->where("id", "=", $id)->first();
        if($data->postNumber == 1){
            return view("admin/BaiViet/View1Show", ["data" => $data]);
        }else if($data->postNumber == 2){
            return view("admin/BaiViet/View2Show", ["data" => $data]);
        }
    }
}
