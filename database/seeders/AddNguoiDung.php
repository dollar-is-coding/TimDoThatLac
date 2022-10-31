<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddNguoiDung extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=6;$i<8;$i++){
        echo "Create Quan Tri Vien {$i}\n";
        NguoiDung::create([
            "ho_ten" =>"Người Dùng {$i}",
            "mat_khau" =>hash::make("12345{$i}"),
            "email" =>"nguoidung{$i}@gmail.com",
            "ngay_sinh"=>"2002/5/12",
            "gioi_tinh"=>1,
            "so_dien_thoai"=>"null",
            "admin"=>0,
            "anh_dai_dien"=>"null"
        ]);
       }
    }
}
