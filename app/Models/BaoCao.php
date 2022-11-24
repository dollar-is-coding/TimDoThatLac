<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaoCao extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='bao_cao';
    protected $fillable=[
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
