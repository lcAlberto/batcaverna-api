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
         $this->call(TeamSeeder::class);
         $this->call(SkillsSeeder::class);
         $this->call(CharacterSeeder::class);
    }
}
