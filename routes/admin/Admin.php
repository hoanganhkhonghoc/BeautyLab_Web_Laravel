<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\QuyenHanController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/home")->middleware("checkQuyen")->group(function(){
    Route::get  ("/index/{year}",   [AdminHomeController::class, "index"])  ->name("homeAdmin");
});
Route::prefix("/admin/quyen/")->middleware("checkAdmin")->group(function(){
    Route::get  ("/list",           [QuyenHanController::class, "list"])    ->name("quyenList");
    Route::get  ("/show/{id}",      [QuyenHanController::class, "show"]);
    Route::post ("/xl_edit/{id}",   [QuyenHanController::class, "xl_edit"]);
});
Route::get("/admin/account/show",   [AdminHomeController::class, "account"])->middleware("checkQuyen");
?>