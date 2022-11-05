<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiDang extends Model
{
    use HasFactory;
    protected $table='bai_dang';
    protected $fillable=[
        'nguoi_dung',
        'the_loai',
        'danh_muc',
        'khu_vuc',
        'tieu_de',
        'noi_dung',
        'dia_chi',
        'trang_thai'
    ];

    public function nguoiDung() {
        return $this->belongsTo(NguoiDung::class);
    }
    public function theLoai() {
        return $this->belongsTo(TheLoai::class);
    }
    public function danhMuc() {
        return $this->belongsTo(DanhMuc::class);
    }
    public function khuVuc() {
        return $this->belongsTo(KhuVuc::class);
    }
}
