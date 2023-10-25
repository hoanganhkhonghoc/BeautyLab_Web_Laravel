<?php

use App\Http\Controllers\Auth\LoginAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix("/login")->group(function(){
    Route::get  ("/showView",   [LoginAuthController::class, 'showViewLogin']) ->name("showViewLogin");
    Route::post ("/xl_login",   [LoginAuthController::class, 'login'])         ->name("login");
});
Route::prefix("/register")->group(function(){
    
});
Route::get("/logout",           [LoginAuthController::class, 'logout'])        ->name("logout");