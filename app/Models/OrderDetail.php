<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $table="order_detail";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "product_id",
        "order_id",
        "price",
        "quanity"
    ];
}
