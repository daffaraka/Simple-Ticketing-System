<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User Role',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('user');

        $superAdmin = User::create([
            'name' => 'Super Admin Role',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $superAdmin->assignRole('super-admin');
    }
}