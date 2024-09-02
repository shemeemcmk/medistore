<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'super123@gmail.com',
            'password' => Hash::make('super123'), // Replace 'password' with your desired password
            'role_id' => '1',
            'user_type' => 'head', // Replace with the actual path to the logo if needed
            'position' => 'main',
        ]);
    }
}
