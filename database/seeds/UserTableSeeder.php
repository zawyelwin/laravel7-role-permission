<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate([
            'name'  => 'Admin',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name'  => 'Volunteer',
            'guard_name' => 'web'
        ]);

        $user = User::firstOrCreate([
            'name'          => 'admin',
            'email'         => 'admin@gmail.com',
            'password'      => '$2y$12$j6EuRHUUMFf3MFWfEzWUROS9/AXmCFJbRUMLa3G1JiihFZarcDti6'
        ]);

        $user->assignRole('Admin');
    }
}
