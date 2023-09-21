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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("order_id");
            $table->integer("price");
            $table->integer("quanity");
            $table->integer("isDeleted")->default(1);
            // thêm 2 cột thành khoá chính
            $table->primary(['product_id', 'order_id']);

            $table->foreign("order_id")->references("id")->on("order");
            $table->foreign("product_id")->references("id")->on("product_detail");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
