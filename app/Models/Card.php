<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    public $table="cart";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "client_id"
    ];
}
