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
            [
                'name' => 'Voo',
                'color' => '#00A86B'
            ],
            [
                'name' => 'Super força',
                'color' => '#FF5733',
            ],
            [
                'name' => 'Resitência',
                'color' => '#6930C3',
            ],
            [
                'name' => 'Super velocidade',
                'color' => '#FFC300',
            ],
            [
                'name' => 'Magia',
                'color' => '#7FDBFF',
            ],
            [
                'name' => 'Teletransporte',
                'color' => '#FF4136',
            ],
            [
                'name' => 'Telecinese',
                'color' => '#2ECC40',
            ],
            [
                'name' => 'Onipresença',
                'color' => '#F012BE',
            ],
            [
                'name' => 'Oniciência',
                'color' => '#85144B',
            ],
            [
                'name' => 'Viagem no tempo',
                'color' => '#3D9970',
            ],
        ]);
    }
}
