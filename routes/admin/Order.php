<?php

use App\Http\Controllers\admin\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/order")->middleware("checkQuyenOrder")->group(function(){
    Route::get  ("/list",                               [OrderController::class, "list"])->name("listAllOrder");
    Route::get  ("/show/{id}",                          [OrderController::class, "show"]);
    Route::post ("/updateOrder/{id}",                   [OrderController::class, "update"]);
    Route::get  ("/deletedOrder/{id}",                  [OrderController::class, "deleteOrder"]);
    Route::get  ("/selectedOrder/{status}",             [OrderController::class, "SelectedOrder"]);
    Route::get  ("/selectedOrderByMethods/{methods}",   [OrderController::class, "selectedOrderByMethods"]);
});
?>