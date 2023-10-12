<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentmethods extends Model
{
    use HasFactory;
    public $table="payment_methods";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "namePay"
    ];
}
