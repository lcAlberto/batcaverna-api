<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaknessSeeder extends Seeder
{
    public function run()
    {
        DB::table('weaknesses')->insert([
            [
                'name' => 'Kriptonita',
                'color' => '#0F52BA',
            ],
            [
                'name' => 'Fogo',
                'color' => '#FF4500',
            ],
            [
                'name' => 'Medo',
                'color' => '#00FF00',
            ],
            [
                'name' => 'Desidratação',
                'color' => '#00BFFF',
            ],
            [
                'name' => 'Ataques cibernéticos',
                'color' => '#8B8B8B',
            ],
            [
                'name' => 'Magia poderosa',
                'color' => '#7FDBFF',
            ],
            [
                'name' => 'Vulnerável a armas de fogo',
                'color' => '#FFD700',
            ],
            [
                'name' => 'Perda de voz',
                'color' => '#6A0D91',
            ],
            [
                'name' => 'Combate corpo a corpo',
                'color' => '#006400',
            ],
            [
                'name' => 'Combate, estratégia',
                'color' => '#FF0000',
            ]
        ]);
    }
}