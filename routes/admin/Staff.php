<?php

use App\Http\Controllers\admin\AdminStaffController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/staff")->middleware("checkAdmin")->group(function(){
    Route::get  ("/list",           [AdminStaffController::class, "list"])        ->name("staffList");
    Route::get  ("/addView",        [AdminStaffController::class, "addView"])     ->name("addStaff");
    Route::post ("/xl_add",         [AdminStaffController::class, "xl_add"]);
    Route::get  ("/show/{id}",      [AdminStaffController::class, "showView"]);
    Route::post ("/xl_edit/{id}",   [AdminStaffController::class, "xl_edit"]);
    Route::get  ("/xl_deleted/{id}",[AdminStaffController::class, "xl_deleted"]);
});