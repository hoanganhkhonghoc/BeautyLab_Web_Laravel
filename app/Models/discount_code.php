<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount_code extends Model
{
    use HasFactory;
    public $table = "discount_code";
    protected $fillable = [
        'code', 
        "money", 
        "created_at", 
        "updated_at", 
        "isDeleted",
        "percent",
        "quanity",
        "staff_id",
    ];
}
