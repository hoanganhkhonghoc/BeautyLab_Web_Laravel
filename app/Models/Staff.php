<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $table = "staff";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "name",
        "email",
        "phone",
        "password",
        "sex",
        "address",
        "level",
        "facilities_id"
    ];
}
