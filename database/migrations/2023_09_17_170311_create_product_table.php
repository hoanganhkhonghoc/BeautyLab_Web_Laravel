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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("namePro")->nullable()->unique();
            $table->integer("isDeleted")->default(1);

            $table->unsignedBigInteger("staff_id")->unsigned();
            $table->unsignedBigInteger("cat_id")->unsigned();
            $table->foreign("staff_id")->references("id")->on("staff");
            $table->foreign("cat_id")->references("id")->on("category");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
