<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::insert([
            ['name' => 'Đen'],
            ['name' => 'Trắng'],
            ['name' => 'Đỏ'],
            ['name' => 'Xanh'],
            ['name' => 'Vàng'],
        ]);
    }
}
