<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'first_name' => 'Admin',
            'last_name' => 'admin',
            'phone' => '0940678725',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$HQA6uxXGTAZPJityLRZqf.oZXXZ.N/a1FHmTsC6IEKc75C5maGuBG', //password
            'email_verified_at' => '2021-12-30 19:59:40',
        ]);
        $role1 = Role::where('slug', 'admin')->first()->id;
        $user1->roles()->attach($role1);

        $user2 = User::create([
            'first_name' => 'Manager',
            'last_name' => 'admin',
            'phone' => '0940678725',
            'email' => 'manager@manager.com',
            'password' => '$2y$10$HQA6uxXGTAZPJityLRZqf.oZXXZ.N/a1FHmTsC6IEKc75C5maGuBG', //password
            'email_verified_at' => '2021-12-30 19:59:40',
        ]);
        $role2 = Role::where('slug', 'manager')->first()->id;
        $user2->roles()->attach($role2);

        $user3 = User::create([
            'first_name' => 'Some Customer',
            'last_name' => 'user',
            'phone' => '0956567657',
            'email' => 'customer@customer.com',
            'password' => Hash::make('password'),//'$2y$10$HQA6uxXGTAZPJityLRZqf.oZXXZ.N/a1FHmTsC6IEKc75C5maGuBG', //password
            'email_verified_at' => '2021-12-30 19:59:40',
        ]);
        $role3 = Role::where('slug', 'customer')->first()->id;
        $user3->roles()->attach($role3);

        $user4 = User::create([
            'first_name' => 'Izrael',
            'last_name' => 'admin',
            'phone' => '0967676767',
            'email' => 'izrael@admin.com',
            'password' => Hash::make('default_pass'),//password
            'email_verified_at' => '2021-12-30 19:59:40',
        ]);
        $role1 = Role::where('slug', 'admin')->first()->id;
        $user4->roles()->attach($role1);
    }
}
