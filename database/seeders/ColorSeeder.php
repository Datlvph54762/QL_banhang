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
            ['name' => 'Đen', 'color_code' => '#000000'],
            ['name' => 'Trắng', 'color_code' => '#FFFFFF'],
            ['name' => 'Đỏ', 'color_code' => '#FF0000'],
            ['name' => 'Xanh', 'color_code' => '#0000FF'],
            ['name' => 'Vàng', 'color_code' => '#FFFF00'],
            ['name' => 'Xanh Navy', 'color_code' => '#000080'],
            ['name' => 'Xám', 'color_code' => '#808080'],
            ['name' => 'Xanh lá', 'color_code' => '#008000'],
            ['name' => 'Nâu', 'color_code' => '#A52A2A'],
            ['name' => 'Be (Beige)', 'color_code' => '#F5F5DC'],
        ]);
    }
}
