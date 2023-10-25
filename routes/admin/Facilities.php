<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FacilitiesController;

Route::prefix("/admin/facilities")->middleware("checkAdmin")->group(function(){
    Route::get  ("/list",           [FacilitiesController::class, "list"])       ->name("listFacilities");
    Route::get  ("/addView",        [FacilitiesController::class, "add"])        ->name("addFacilities");
    Route::post ("/xl_add",         [FacilitiesController::class, "xl_add"]);
    Route::get  ("/show/{id}",      [FacilitiesController::class, "show"]);
    Route::get  ("/editView/{id}",  [FacilitiesController::class, "edit"]);
    Route::post ("/xl_edit/{id}",   [FacilitiesController::class, "xl_edit"]);
    Route::get  ("/xl_delete/{id}", [FacilitiesController::class, "xl_delete"]);
});

?>