<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "product";
    use HasFactory;
    protected $fillable = [
        'namePro', 
        "staff_id", 
        "created_at", 
        "updated_at", 
        "isDeleted",
        "cat_id",
    ];
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
