<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public $table = "like";
    protected $fillable = [
        'client_id', 
        "product_detail_id", 
        "created_at", 
        "updated_at", 
        "isDeleted"
    ];
}
