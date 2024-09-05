<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_users_permision = Permission::create(['name' => 'list users']);
        $list_one_user_permision = Permission::create(['name' => 'list user']);
        $create_users_permision = Permission::create(['name' => 'create users']);
        $edit_users_permision = Permission::create(['name' => 'edit users']);
        $delete_users_permision = Permission::create(['name' => 'delete users']);
    }
}
