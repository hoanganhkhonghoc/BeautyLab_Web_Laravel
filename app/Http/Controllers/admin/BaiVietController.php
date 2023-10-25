<?php

namespace App\Http\Controllers\admin;

use App\Models\BaiVietModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BaiVietController extends Controller
{
    /*
    function: choose (show view choose form blog)
    @redirect: /admin/baiviet/choose
    @methods: get
    @return: view("admin/BaiViet/chooseBaiViet")
    */
    public function choose(){
        return view("admin/BaiViet/chooseBaiViet");
    }

    /*
    function: xl_view (logic and choose view show blog)
    @redirect: /admin/baiviet/xulyView
    @methods: post
    @param: Request (value to form)
    @return: view by choose
    @switch(choose)
        choose = 1: return view("admin/BaiViet/View1Add")
        choose = 2: return view("admin/BaiViet/View2Add")
        default: return view("admin/BaiViet/View1Add")
    */
    public function xl_view(Request $request){
        switch($request->choose){
            case 1:
                return view("admin/BaiViet/View1Add");
            case 2:
                return view("admin/BaiViet/View2Add");
            default:
                return view("admin/BaiViet/View1Add");
        }
    }

    /*
    function: xl_add1 (logic and add blog (view 1))
    @redirect: /admin/baiviet/xl_add1
    @methods: post
    @param: Request (value to form)
    @return: redirect("/admin/baiviet/list")
    */
    public function xl_add1(Request $request){
        $timestamp = time();
        $partImg1 = $timestamp . "_img1." . $request->img1->extension();
        $request->img1->move(public_path('img'), $partImg1);
        
        $partImg2 = $timestamp . "_img2." . $request->img2->extension();
        $request->img2->move(public_path('img'), $partImg2);

        $post = new BaiVietModel();
        $post->tieude2 = "";
        $post->img3 = "";
        $post->img4 = "";
        $post->img5 = "";
        $post->tieude1 = $request->tieude1;
        $post->noidung1 = $request->noidung1;
        $post->noidung2 = $request->noidung2;
        $post->img1 = $partImg1;
        $post->img2 = $partImg2;
        $post->postNumber = 1;
        if(Auth::guard("admin")->check()){
            $post->staff_id = 1;
        }else{
            $post->staff_id = Auth::guard("staff")->user()->id;
        }
        $post->save();
        return redirect("/admin/baiviet/list");
    }

    /*
    function: xl_add2 (logic and add blog (view 2))
    @redirect: /admin/baiviet/xl_add2
    @methods: post
    @param: Request (value to form)
    @return: redirect("/admin/baiviet/list")
    */
    public function xl_add2(Request $request){
        $timestamp = time();

        $partImg1 = $timestamp . "_img1." . $request->img1->extension();
        $request->img1->move(public_path('img'), $partImg1);

        $partImg2 = $timestamp . "_img2." . $request->img2->extension();
        $request->img2->move(public_path('img'), $partImg2);

        $partImg3 = $timestamp . "_img3." . $request->img3->extension();
        $request->img3->move(public_path('img'), $partImg3);

        $partImg4 = $timestamp . "_img4." . $request->img4->extension();
        $request->img4->move(public_path('img'), $partImg4);

        $partImg5 = $timestamp . "_img5." . $request->img5->extension();
        $request->img5->move(public_path('img'), $partImg5);
        $post = new BaiVietModel();
        $post->tieude2 = $request->tieude2;
        $post->img3 = $partImg3;
        $post->img4 = $partImg4;
        $post->img5 = $partImg5;
        $post->tieude1 = $request->tieude1;
        $post->noidung1 = $request->noidung1;
        $post->noidung2 = $request->noidung2;
        $post->img1 = $partImg1;
        $post->img2 = $partImg2;
        $post->postNumber = 2;
        if(Auth::guard("admin")->check()){
            $post->staff_id = 1;
        }else{
            $post->staff_id = Auth::guard("staff")->user()->id;
        }
        $post->save();
        return redirect("/admin/baiviet/list");
    }

    /*
    function: list (show list view manager blog)
    @redirect: /admin/baiviet/list
    @methods: get
    @return: view("admin/BaiViet/list")
    @data: get all data in post table where isDeleted != 0
    */
    public function list(){
        $data = BaiVietModel::where("isDeleted", "!=", 0)->get();
        return view("admin/BaiViet/list", ["data" => $data]);
    }

    /*
    function: show (show view blog by id and view)
    @redirect: /admin/baiviet/show
    @methods: get
    @param: $id (id post table)
    @return: view by postNumber
    @switch(postNumber)
            postNumber == 1: view("admin/BaiViet/View1Show")
            postNumber == 2: view("admin/BaiViet/View2Show")
            default: view("admin/BaiViet/View1Show")
    @data: get value in post table order by id
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
