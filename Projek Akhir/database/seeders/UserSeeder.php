<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=> 'admin',
            'password'=>bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        $seller = User::create([
            'name'=>'Yusuf Fikhi',
            'email'=>'yufi@gmail.com',
            'role'=> 'seller',
            'password'=>bcrypt('12345678')
        ]);
        $seller->assignRole('seller');

        $buyer = User::create([
            'name'=>'Andi Adnan',
            'email'=>'aadnan@gmail.com',
            'role'=> 'buyer',
            'password'=>bcrypt('12345678')
        ]);
        $buyer->assignRole('buyer');
    }
}
