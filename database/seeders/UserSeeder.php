<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $member = User::create([
            'name'      => 'member',
            'email'     => 'member@example.com',
            'password'  => Hash::make('member'),
        ]);
        $member->assignRole('member');

        $admin = User::create([
            'name'      => 'admin',
            'email'     => 'admin@example.com',
            'password'  => Hash::make('admin'),
        ]);
        $admin->assignRole('admin');

        $superAdmin = User::create([
            'name'      => 'superadmin',
            'email'     => 'superadmin@example.com',
            'password'  => Hash::make('superadmin'),
        ]);
        $superAdmin->assignRole('super-admin');
    }
}
