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
        Schema::create('new_staff', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->integer("isDeleted")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_staff');
    }
};
