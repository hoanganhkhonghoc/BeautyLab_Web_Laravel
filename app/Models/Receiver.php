<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;
    public $table="receiver";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "client_id",
        "name",
        "phone",
        "address",
        "sex"
    ];
}
