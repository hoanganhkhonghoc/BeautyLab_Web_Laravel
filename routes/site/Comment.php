<?php

use App\Http\Controllers\site\CommentController;
use Illuminate\Support\Facades\Route;
Route::prefix("/site/comment")->middleware("checkClient")->group(function(){
    Route::post("/add/{id}", [CommentController::class, "xl_add"]);
});
?>