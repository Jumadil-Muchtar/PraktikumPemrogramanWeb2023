<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'AdminKU@admin.com',
            'password' => bcrypt('Admin'),
            'Umur' => rand(25, 40),
            'Tempat_Lahir' => 'CPU',
            'Tempat_Tinggal' => 'CPU',
        ]);

        User::create([
            'name' => 'Pak Guru',
            'role' => 'teacher',
            'email' => 'Pak Guru@teacher.com',
            'password' => bcrypt('Teacher1'),
            'Umur' =>  rand(20, 40),
            'Tempat_Lahir' => 'Sidenreng Rappang',
            'Tempat_Tinggal' => 'Panca Rijang',
        ]);

        User::create([
            'name' => 'Ibu Guru',
            'role' => 'teacher',
            'email' => 'Ibu Guru@teacher.com',
            'password' => bcrypt('Teacher2'),
            'Umur' =>  rand(20, 40),
            'Tempat_Lahir' => 'Makassar',
            'Tempat_Tinggal' => 'Paccerakkang',
        ]);

        User::create([
            'name' => 'Pak Guru2',
            'role' => 'teacher',
            'email' => 'PakGuru2@teacher.com',
            'password' => bcrypt('Teacher3'),
            'Umur' =>  rand(20, 40),
            'Tempat_Lahir' => 'Makassar',
            'Tempat_Tinggal' => 'Paccerakkang',
        ]);

        User::create([
            'name' => 'Susan',
            'role' => 'student',
            'email' => 'Susan@student.com',
            'password' => bcrypt('Student1'),
            'Umur' =>  rand(17, 30),
            'Tempat_Lahir' => 'Makassar',
            'Tempat_Tinggal' => 'Sahabat',
        ]);  
        
        User::create([
            'name' => 'Anti',
            'role' => 'student',
            'email' => 'Anti@student.com',
            'password' => bcrypt('student2'),
            'Umur' =>  rand(17, 30),
            'Tempat_Lahir' => 'Makassar',
            'Tempat_Tinggal' => 'Damai',
        ]); 
    }
}
