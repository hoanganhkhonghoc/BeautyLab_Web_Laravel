<?php

use App\Http\Controllers\site\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix("/site/order")->middleware("checkClient")->group(function(){
    Route::get("/index/{id}", [OrderController::class, "index"]);
    Route::post("/addOrder", [OrderController::class, "add"]);
    Route::get("/list",[OrderController::class, "list"]);
    Route::get("/show/{id}", [OrderController::class, "show"]);
    Route::get("/deleted/{id}", [OrderController::class, "deleted"]);
    Route::get("/thankyou", [OrderController::class, "thankyou"]);
});

?>