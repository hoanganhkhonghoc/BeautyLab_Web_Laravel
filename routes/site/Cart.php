<?php

use App\Http\Controllers\site\CardController;
use Illuminate\Support\Facades\Route;

Route::prefix("/site/card")->middleware("checkClient")->group(function(){
    Route::get("/show", [CardController::class, "show"])->name("showCard");

})

?>