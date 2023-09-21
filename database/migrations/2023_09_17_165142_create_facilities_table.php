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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string("name")->nullable();
            $table->string("address")->nullable()->unique();
            $table->integer("isDeleted")->default(1);
            $table->unsignedBigInteger("admin_id")->unsigned();

            $table->foreign("admin_id")->references("id")->on("admin");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
