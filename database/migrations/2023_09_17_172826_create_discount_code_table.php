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
        Schema::create('discount_code', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // mã giảm giá
            $table->string("code")->nullable();
            // số tiền giảm giá
            $table->integer("money")->nullable();
            $table->integer("percent")->nullable();
            // số lượng mã áp dụng
            $table->integer("quanity")->nullable();
            $table->integer("isDeleted")->default(1);

            $table->unsignedBigInteger("staff_id")->unsigned();
            $table->foreign("staff_id")->references("id")->on("staff");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_code');
    }
};
