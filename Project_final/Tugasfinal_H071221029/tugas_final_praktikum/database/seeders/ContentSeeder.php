<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Content::create([
            'title' => 'Aljabar Linear',
            'content' => 'Pengenalan awal Aljabar Linear',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);

        Content::create([
            'title' => 'AlJabar Pertemuan 2',
            'content' => 'Materi berikut dari Alin',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);


        Content::create([
            'title' => 'Statistika',
            'content' => 'Pengenalan Awal Statistika',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);

        Content::create([
            'title' => 'Statistika Pertemuan 2',
            'content' => 'Materi berikut dari Statistika',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);


        Content::create([
            'title' => 'Sistem Operasi',
            'content' => 'Pengenalan Awal Sistem Operasi',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);

        Content::create([
            'title' => 'Sistem Operasi Pertemuan 2',
            'content' => 'Materi Berikut dari sisop',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);


        Content::create([
            'title' => 'Rekaya Perangkat Lunak',
            'content' => 'Pengenalan Awal RPL',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);

        Content::create([
            'title' => 'RPL Pertemuan 2',
            'content' => 'Materi Berikut dari RPL',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);

        Content::create([
            'title' => 'PBM',
            'content' => 'Pengenalan Awal PBM',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);

        Content::create([
            'title' => 'PBM Pertemuan 2',
            'content' => 'Materi Berikut dari PBM',
            'youtube_link'=> 'https://youtu.be/vdOXiW23wTk?si=5WwvCdh4dk_CwhaH',
        ]);


    }
}
