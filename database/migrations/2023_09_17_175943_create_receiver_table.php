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
        Schema::create('receiver', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->integer("sex");
            $table->integer("isDeleted")->default(1);

            $table->unsignedBigInteger("client_id")->unsigned();
            $table->foreign("client_id")->references("id")->on("client");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receiver');
    }
};
