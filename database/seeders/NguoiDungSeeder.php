<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++){
            echo "Create Quan Tri Vien {$i}\n";
            NguoiDung::create([
                "ho_ten" =>"user{$i}",
                "mat_khau" =>hash::make("12345{$i}"),
                "email" =>"nguoidung{$i}@gmail.com",
                "ngay_sinh"=>"2002/5/12",
                "gioi_tinh"=>1,
                "so_dien_thoai"=>"",
                "admin"=>0,
                "anh_dai_dien"=>""
            ]);
           }
    }
}
