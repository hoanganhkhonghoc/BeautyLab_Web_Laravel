<?php

use App\Http\Controllers\admin\AdminClientController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/client/")->middleware("checkQuyenTaiKhoan")->group(function(){
    Route::get  ("/list",           [AdminClientController::class, 'list'])         ->name("clientList");
    Route::get  ("/addView",        [AdminClientController::class, "addView"])      ->name("clientAdd");
    Route::post ("/xl_add",         [AdminClientController::class, "xl_add"]);
    Route::get  ("/show/{id}",      [AdminClientController::class, "show"]);
    Route::post ("/xl_edit/{id}",   [AdminClientController::class, "xl_edit"]);
    Route::get  ("/xl_deleted/{id}",[AdminClientController::class, "xl_deleted"]);
});