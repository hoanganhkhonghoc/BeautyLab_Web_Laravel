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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // tổng tiền của đơn hàng
            $table->integer("sum")->nullable();
            $table->date("date_order");
            $table->integer("isDeleted")->default(1);
            // trạng thái đơn hàng
            // 0 đã huỷ đơn
            // 1 đã đặt chờ xác nhận
            // 2 đang giao hàng
            // 3 đã giao hàng
            $table->integer("status");

            $table->unsignedBigInteger("client_id")->unsigned();
            $table->unsignedBigInteger("receiver_id")->unsigned();
            $table->unsignedBigInteger("pay_id")->unsigned();
            $table->foreign("client_id")->references("id")->on("client");
            $table->foreign("receiver_id")->references("id")->on("receiver");
            $table->foreign("pay_id")->references("id")->on("payment_methods");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
