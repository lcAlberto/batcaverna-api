<?php

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            ['name' => 'Voo'],
            ['name' => 'Super força'],
            ['name' => 'Resitência'],
            ['name' => 'Super velocidade'],
            ['name' => 'Magia'],
            ['name' => 'Teletransporte'],
            ['name' => 'Telecinese'],
            ['name' => 'Onipresença'],
            ['name' => 'Oniciência'],
            ['name' => 'Viagem no tempo'],
        ]);
    }
}
