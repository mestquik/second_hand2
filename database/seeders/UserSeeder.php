<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


         User::create([
            'name' => 'Admin',
            'image' => 'user1.png',
            'email' => 'admin@hotmail.com',
            'password' => Hash::make('password'),
            'status' => '1',

        ]);
        User::create([
            'name' => 'Standart User',
            'image' => 'user2.png',
            'email' => 'user@hotmail.com',
            'password' => Hash::make('password'),
            'status' => '0',

        ]);
    }
}
