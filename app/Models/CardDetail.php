<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDetail extends Model
{
    use HasFactory;
    public $table = "cart_detail";
    protected $fillable = [
        "created_at",
        "updated_at",
        "cart_id",
        "product_detail_id",
        "isDeleted"
    ];
}
