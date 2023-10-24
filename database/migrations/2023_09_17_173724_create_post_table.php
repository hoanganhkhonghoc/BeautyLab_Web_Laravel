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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("tieude1");
            $table->string("tieude2");
            $table->string("noidung1");
            $table->string("noidung2");
            $table->string("img1");
            $table->string("img2");
            $table->string("img3");
            $table->string("img4");
            $table->string("img5");
            $table->integer("postNumber");
            $table->string("isDeleted")->default(1);

            $table->unsignedBigInteger("staff_id")->unsigned();
            $table->foreign("staff_id")->references("id")->on("staff");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
