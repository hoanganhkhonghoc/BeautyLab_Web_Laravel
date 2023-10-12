<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public $table="order";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "client_id",
        "sum",// tong tien don hang
        "date_order", // ngay tao don
        "status", // trang thai don hang
        "receiver_id",
        "pay_id"
    ];
}
