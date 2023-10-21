<?php

use App\Http\Controllers\admin\CommentController;
use Illuminate\Support\Facades\Route;
Route::prefix("/admin/comment")->middleware("checkQuyenBinhluan")->group(function(){
    Route::get("/list", [CommentController::class, "list"]);
});