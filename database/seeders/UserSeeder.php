<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        # role admin
        User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => 'password',
            'role' => 2,
        ]);

        User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => 'password',
            'role' => 3,
        ]);



    }
}
