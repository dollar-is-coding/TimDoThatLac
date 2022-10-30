<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiDung extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table='nguoi_dung';
    protected $fillable=[
        'ho_ten',
        'mat_khau',
        'email',
        'so_dien_thoai',
        'admin',
        'ngay_sinh',
        'gioi_tinh',
        'anh_dai_dien'
    ];
}
