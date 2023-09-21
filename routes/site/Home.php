<?php

use App\Http\Controllers\site\SiteHomeController;
use Illuminate\Support\Facades\Route;
Route::prefix("/site")->group(function(){
    Route::get("/home", [SiteHomeController::class, 'index'])->name("homeSite");
})
?>