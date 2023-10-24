<?php

use App\Http\Controllers\site\BaiVietController;
use Illuminate\Support\Facades\Route;

Route::prefix("/site/baiviet")->group(function(){
    Route::get("/list", [BaiVietController::class, "list"]);
    Route::get("/show/{id}", [BaiVietController::class, "show"]);
});
?>