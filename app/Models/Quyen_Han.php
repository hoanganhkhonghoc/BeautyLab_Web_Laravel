<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen_Han extends Model
{
    public $table = "quyen_han";
    use HasFactory;
    protected $fillable = [
            "isDeleted",
            "created_at",
            "updated_at",
            "ql_binhluan",
            "ql_sanpham",
            "ql_donhang",
            "ql_lichdattruoc",
            "ql_tuyendung",
            "ql_khachhang",
            "ql_baiviet",
            "staff_id"
    ];
}
