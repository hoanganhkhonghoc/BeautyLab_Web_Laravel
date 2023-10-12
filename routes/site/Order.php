<?php

use App\Http\Controllers\site\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix("/site/order")->middleware("checkClient")->group(function(){
    Route::get("/index/{id}", [OrderController::class, "index"]);
    Route::post("/addOrder", [OrderController::class, "add"]);
});

?>