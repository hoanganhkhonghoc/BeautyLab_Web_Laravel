<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public $table = "product_detail";
    use HasFactory;
    protected $fillable = [
        "id",
        'img', 
        "price", 
        "created_at", 
        "updated_at", 
        "isDeleted",
        "quanity",
        "color",
        "detail",
        "isSoid",
        "product_id",
    ];
}
