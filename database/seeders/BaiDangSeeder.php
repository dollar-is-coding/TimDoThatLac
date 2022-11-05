<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BaiDang;

class BaiDangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BaiDang::create([
            'nguoi_dung_id'=>1,
            'the_loai_id'=>1,
            'danh_muc_id'=>1,
            'khu_vuc_id'=>1,
            'tieu_de'=>'Tìm ví mất',
            'noi_dung'=>'nó đẹp',
            'dia_chi'=>'abc,Nhà Bè',
            'trang_thai'=>0
        ]);
    }
}
