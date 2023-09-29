<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $table = "admin";
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
    ];
}
