<?php

use App\Http\Controllers\admin\AdminCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/category")->middleware("checkQuyenSanPham")->group(function(){
    Route::get("/list",             [AdminCategoryController::class, "list"])       ->name("listCategory");
    Route::get("/addView",          [AdminCategoryController::class, "add"])        ->name("addCategory");
    Route::post("/xl_add",          [AdminCategoryController::class, "xl_add"]);
    Route::get("/xl_delete/{id}",   [AdminCategoryController::class, "xl_delete"]);
    Route::get("/editView/{id}",    [AdminCategoryController::class, "edit"]);
    Route::post("/xl_edit/{id}",    [AdminCategoryController::class, "xl_edit"]);
})
?>