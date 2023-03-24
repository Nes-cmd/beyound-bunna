<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrator', 'slug' => 'admin']);
        Role::create(['name' => 'Manager', 'slug' => 'manager']);
        Role::create(['name' => 'Customer', 'slug' => 'customer']);
    }
}
