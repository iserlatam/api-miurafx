<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Create admin User and assign the role to him.
        Role::create(['name' => 'master']);
        Role::create(['name' => 'monitor']);
        Role::create(['name' => 'accesor']);
        Role::create(['name' => 'cliente']);
    }
}
