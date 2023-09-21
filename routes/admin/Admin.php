<?php

use App\Http\Controllers\admin\AdminHomeController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/home")->middleware("checkQuyen")->group(function(){
    Route::get("/index", [AdminHomeController::class, "index"])->name("homeAdmin");
});
?>