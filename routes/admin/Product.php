<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminProductController;

Route::prefix("/admin/product")->middleware("checkQuyenSanPham")->group(function(){
    Route::get("/list", [AdminProductController::class, 'list'])->name("listProduct");
});
?>