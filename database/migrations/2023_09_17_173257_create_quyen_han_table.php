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
        Schema::create('quyen_han', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer("ql_binhluan");
            $table->integer("ql_sanpham");
            $table->integer("ql_donhang");
            $table->integer("ql_lichdattruoc");
            $table->integer("ql_tuyendung");
            $table->integer("ql_khachhang");
            $table->integer("ql_baiviet");
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
        Schema::dropIfExists('quyen_han');
    }
};
