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
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name")->nullable();
            $table->string("email")->nullable()->unique();
            $table->string("phone")->nullable()->unique();
            $table->string("password")->nullable();
            $table->integer("sex");
            $table->string("address")->nullable();
            $table->integer("level")->nullable();
            $table->integer("isDeleted")->default(1);

            $table->unsignedBigInteger("admin_id")->unsigned();
            $table->foreign("admin_id")->references("id")->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
