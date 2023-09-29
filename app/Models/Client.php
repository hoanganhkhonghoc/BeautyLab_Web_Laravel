<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $table = "client";
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
        "admin_id"
    ];
}
