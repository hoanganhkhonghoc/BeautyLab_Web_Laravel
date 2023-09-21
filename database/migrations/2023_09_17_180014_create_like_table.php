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
        Schema::create('like', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("isDeleted")->default(1);

            $table->unsignedBigInteger("client_id")->unsigned();
            $table->unsignedBigInteger("product_detail_id")->unsigned();
            $table->foreign("client_id")->references("id")->on("client");
            $table->foreign("product_detail_id")->references("id")->on("product_detail");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like');
    }
};
