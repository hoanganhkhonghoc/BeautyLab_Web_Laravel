<?php

use App\Http\Controllers\site\SearchController;
use Illuminate\Support\Facades\Route;

Route::post("/site/search", [SearchController::class, "search"]);
?>