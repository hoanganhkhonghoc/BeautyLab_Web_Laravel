<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("img")->nullable();
            // Giá sản phẩm
            $table->integer("price");
            // Số lượng sản phẩm
            $table->integer("quanity");
            $table->string("color")->nullable();
            $table->string("detail");
            // Sản phẩm còn hàng hay không
            // isSoid = 1 (còn hàng > 10 sản phẩm)
            // isSoid = 2 (còn hàng > 0 sản phẩm và < 10 sản phẩm)
            // isSoid = 0 (hết hàng)
            $table->integer("isSoid")->nullable();
            $table->integer("isDeleted")->default(1);

            $table->unsignedBigInteger("product_id")->unsigned();
            $table->foreign("product_id")->references("id")->on("product");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_detail');
    }
};
