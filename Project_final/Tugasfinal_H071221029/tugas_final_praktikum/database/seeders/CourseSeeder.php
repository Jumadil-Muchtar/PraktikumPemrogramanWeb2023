<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Course::create([
            'course_name' => 'Aljabar Linear',
            'description' => 'Materi Awal Aljabar Linear',
            'start_date' => now(),
            'end_date' => now()->addyear(),
            'instructor'=>'Pak Guru',
            'instructor_number'=>'81240555412',
            
        ]);

        Course::create([
            'course_name' => 'Statistika',
            'description' => 'Materi Awal Statistika',
            'start_date' => now(),
            'end_date' => now()->addyear(),
            'instructor'=>'Ibu Guru',
            'instructor_number'=>'81240555412',
            
        ]);

        Course::create([
            'course_name' => 'Sistem Operasi',
            'description' => 'Materi Awal Sistem Operasi',
            'start_date' => now(),
            'end_date' => now()->addyear(),
            'instructor'=>'Pak Guru',
            'instructor_number'=>'81240555412',
            
        ]);

        Course::create([
            'course_name' => 'Rekayasa Perangkat Lunak',
            'description' => 'Materi Awal RPL',
            'start_date' => now(),
            'end_date' => now()->addyear(),
            'instructor'=>'Ibu Guru',
            'instructor_number'=>'81240555412',
            
        ]);

        Course::create([
            'course_name' => 'PBM',
            'description' => 'Materi Awal PBM',
            'start_date' => now(),
            'end_date' => now()->addyear(),
            'instructor'=>'Pak Guru',
            'instructor_number'=>'81240555412',
            
        ]);
        
        }
}
