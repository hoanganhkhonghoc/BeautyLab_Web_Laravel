<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiVietModel extends Model
{
    use HasFactory;
    public $table = "post";
    protected $fillable = [
        "created_at", 
        "updated_at", 
        "isDeleted",
        "tieude1",
        "tieude2",
        "noidung1",
        "noidung2",
        "img1",
        "img2",
        "img3",
        "img4",
        "img5",
        "isDeleted",
        "postNumber",
    ];
}
