<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    // trang chủ khi phân quyền xong
    public function index(){
        return view("admin/Dashbroad/dashbroad");
    }
}
