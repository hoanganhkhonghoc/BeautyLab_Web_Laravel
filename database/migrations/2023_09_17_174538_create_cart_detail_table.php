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
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger("cart_id");
            $table->unsignedBigInteger("product_detail_id");
            $table->integer("isDeleted")->default(1);
            $table->integer("quanity");
            // thêm 2 cột thành khoá chính
            $table->primary(['cart_id', 'product_detail_id']);

            $table->foreign("cart_id")->references("id")->on("cart");
            $table->foreign("product_detail_id")->references("id")->on("product_detail");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_detail');
    }
};
