<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Thêm dữ liệu vào bảng categories
       DB::table('categories')->insert([
        ['name' => 'Necklace', 'description' => Str::random(255),'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Bracelet', 'description' => Str::random(255),'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Ring', 'description' => Str::random(255),'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Earrings', 'description' => Str::random(255),'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Anklet', 'description' => Str::random(255),'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
     ]);
     
    }
}
