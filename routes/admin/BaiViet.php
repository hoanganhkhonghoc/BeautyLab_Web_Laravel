<?php

use App\Http\Controllers\admin\BaiVietController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/baiviet")->middleware("checkQuyenBaiViet")->group(function(){
    Route::get("/choose", [BaiVietController::class, "choose"]);
    Route::post("/xulyView", [BaiVietController::class, "xl_view"]);
    Route::post("/xl_add_view1", [BaiVietController::class, "xl_add1"]);
    Route::post("/xl_add_view2", [BaiVietController::class, "xl_add2"]);
    Route::get("/list", [BaiVietController::class, "list"]);
    Route::get("/show/{id}", [BaiVietController::class, "show"]);
});