<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("dotas")->insert([
            'hero'=> 'Slark',
            'role' => 'Carry',
            'type' => 'Melee',
            'ability'=> 'Dark Pact, Pounce, Essence Shift, Shadow Dance',
            'description'=> 'Pouncing into danger then slipping back out is what Slark does best. He rushes at the chance to pin or corner a lone foe, steals their essence with each cut from his dagger, and is always ready to vanish should the tables turn.
            ',
            'difficulty'=> 'Medium',
        ]);
    }
}
