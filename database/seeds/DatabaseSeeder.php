<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HeroesTableSeeder::class);
//        factory(\App\Models\Superhero::class, 10)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
