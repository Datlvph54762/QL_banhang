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
        $permissions= [
            ['name' => 'view_product'],
            ['name' => 'create_product'],
            ['name' => 'edit_product'],
            ['name' => 'delete_product'],

            ['name' => 'variant_manage'],

            ['name' => 'view_order'],
            ['name' => 'update_order_status'],
            ['name' => 'update_payment_status'],

            ['name' => 'manage_categories'],
        ];

        foreach($permissions as $permission){
            Permission::updateOrCreate(
                ['name'=> $permission['name']], $permission
            );
        }
    }
}
