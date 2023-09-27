<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* 
Route này sẽ có tác dụng khi người dùng chưa biết là admin hay site thì cứ mặc định cho chạy vào site
*/
Route::get('/', function () {
    return view('site/Home/home');
});
/*
Nhóm Route phân quyền chứa chức năng đăng nhập, đăng ký, đăng xuất
*/
Route::prefix("/")->group(__DIR__ . "/Auth/Auth.php");
/*
Nhóm Route bên phía Admin
*/
Route::prefix("/")->group(__DIR__ . "/admin/Admin.php");
Route::prefix("/")->group(__DIR__ . "/admin/Product.php");
Route::prefix("/")->group(__DIR__ . "/admin/Category.php");
Route::prefix("/")->group(__DIR__ . "/admin/Facilities.php");
/*
Nhóm Route bên phía Site
*/
Route::prefix("/")->group(__DIR__ . "/site/Home.php");

// phục vụ mục đích test
Route::get('/test',[TestController::class, "test"]);