<?php

use App\Http\Controllers\site\CardController;
use Illuminate\Support\Facades\Route;

Route::prefix("/site/card")->middleware("checkClient")->group(function(){
    Route::get  ("/show",                       [CardController::class, "show"])            ->name("showCard");
    Route::post ("/addDetail/{id}",             [CardController::class, "addCartDetail"]);
    Route::get  ("/addList/{id}/{quanity}",     [CardController::class, "addCartList"]);
    Route::get  ("/deleted/{idPro}/{idCart}",   [CardController::class, "xl_deleted"]);
    Route::post ("/updateCart/{idCart}",        [CardController::class, "updateCart"]);
})

?>