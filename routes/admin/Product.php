<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminProductDetailController;

Route::prefix("/admin/product")->middleware("checkQuyenSanPham")->group(function(){
    Route::get  ("/list",           [AdminProductController::class, 'list'])                ->name("listProduct");
    Route::get  ("/addView",        [AdminProductController::class, 'addView'])             ->name("addProduct");
    Route::post ("/xl_add",         [AdminProductController::class, 'xl_add']);
    Route::get  ("/editView/{id}",  [AdminProductController::class, 'edit'])                ->name("editProduct");
    Route::post ("/xl_edit/{id}",   [AdminProductController::class, 'xl_edit']);
});

Route::prefix("/admin/product_detail")->middleware("checkQuyenSanPham")->group(function() {
    Route::get  ("/list/{id}",      [AdminProductDetailController::class, "list"])          ->name("listProductDetail");
    Route::get  ("/addView/{id}",   [AdminProductDetailController::class, "addView"])       ->name("addProductDetail");
    Route::post ("/xl_add/{id}",    [AdminProductDetailController::class, "xl_add"]);
    Route::get  ("/xl_delete/{id}", [AdminProductDetailController::class, "xl_delete"]);
    Route::get  ("/editView/{id}",  [AdminProductDetailController::class, "editView"]); 
    Route::post ("/xl_edit/{id}",   [AdminProductDetailController::class, "xl_edit"]);
    Route::get  ("/show/{id}",      [AdminProductDetailController::class, "show"]);
});
?>