<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminProductController;

Route::prefix("/admin/product")->middleware("checkQuyenSanPham")->group(function(){
    Route::get  ("/list",           [AdminProductController::class, 'list'])      ->name("listProduct");
    Route::get  ("/addView",        [AdminProductController::class, 'addView'])   ->name("addProduct");
    Route::post ("/xl_add",         [AdminProductController::class, 'xl_add']);
    Route::get  ("/editView/{id}",  [AdminProductController::class, 'edit'])      ->name("editProduct");
    Route::post ("/xl_edit/{id}",   [AdminProductController::class, 'xl_edit']);
});
?>