<?php

use Illuminate\Database\Seeder;

class HeroesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hero = [
            'nickname' => 'Superman',
            'real_name' => 'Clark Kent',
            'original_description' => 'he was born Kal-El on the planet Krypton, before being rocketed to Earth as an infant by his scientist father Jor-El, moments before Krypton\'s destruction…',
            'superpower' => 'solar energy absorption and healing factor, solar flare and heat vision, solar invulnerability, flight…',
            'catch_phrase' => 'Look, up in the sky, it\'s a bird, it\'s a plane, it\'s Superman!',
            'image' => 'supermen.jpeg',
        ];
        DB::table('superheroes')->insert($hero);
    }
}
