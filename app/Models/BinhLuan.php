<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table='binh_luan';
    protected $fillable= [
        'nguoi_dung_id',
        'bai_dang_id',
        'noi_dung',
    ];
    public function nguoiDung() {
        return $this->belongsTo(NguoiDung::class);
    }
    public function baiDang() {
        return $this->belongsTo(BaiDang::class);
    }
}
