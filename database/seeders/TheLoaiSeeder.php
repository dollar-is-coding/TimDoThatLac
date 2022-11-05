<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TheLoai;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TheLoai::create(['ten'=>'Mất đồ']);
        TheLoai::create(['ten'=>'Tìm đồ']);
    }
}
