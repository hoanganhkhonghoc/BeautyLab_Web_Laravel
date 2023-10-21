<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    public $table = "comment";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "content",
        "date",
        "client_id",
        "product_detail_id",
    ];
}
