<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => Hash::make('123456'),
            'role_id'=>'3'
        ]);

        User::factory()->count(10)->create();
    }
}
