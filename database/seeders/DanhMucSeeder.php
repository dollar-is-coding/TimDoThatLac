<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DanhMuc;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DanhMuc::create(['ten'=>'Ví']);
        DanhMuc::create(['ten'=>'Điện thoại']);
        DanhMuc::create(['ten'=>'Giấy tờ tuỳ thân']);
        DanhMuc::create(['ten'=>'Trang sức']);
    }
}
