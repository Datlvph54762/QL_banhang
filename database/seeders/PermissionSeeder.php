<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['name' => 'view_dashboard'],
            ['name' => 'manage_users'],
            ['name' => 'manage_products'],
            ['name' => 'manage_orders'],
        ]);
    }
}
