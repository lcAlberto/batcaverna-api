<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'Invisibilidade',
                'color' => '#8E44AD',
            ],
            [
                'name' => 'Controle mental',
                'color' => '#FF6F61',
            ],
            [
                'name' => 'Manipulação do tempo',
                'color' => '#1ABC9C',
            ],
            [
                'name' => 'Intangibilidade',
                'color' => '#E67E22',
            ],
            [
                'name' => 'Geração de energia',
                'color' => '#16A085',
            ],
            [
                'name' => 'Regeneração',
                'color' => '#27AE60',
            ],
            [
                'name' => 'Manipulação da gravidade',
                'color' => '#34495E',
            ],
            [
                'name' => 'Leitura de mentes',
                'color' => '#9B59B6',
            ],
            [
                'name' => 'Comunicação com animais',
                'color' => '#F39C12',
            ],
            [
                'name' => 'Elasticidade',
                'color' => '#2980B9',
            ],
            [
                'name' => 'Fator de cura',
                'color' => '#C0392B',
            ],
            [
                'name' => 'Imortalidade',
                'color' => '#8E44AD',
            ],
            [
                'name' => 'Metamorfose',
                'color' => '#D35400',
            ],
            [
                'name' => 'Criação de ilusões',
                'color' => '#3498DB',
            ],
            [
                'name' => 'Controle de elementos',
                'color' => '#E74C3C',
            ],
            [
                'name' => 'Visão raio-x',
                'color' => '#2C3E50',
            ],
            [
                'name' => 'Telepatia',
                'color' => '#9B59B6',
            ],
            [
                'name' => 'Super audição',
                'color' => '#E67E22',
            ],
            [
                'name' => 'Transformação em animais',
                'color' => '#16A085',
            ],
            [
                'name' => 'Criocinese',
                'color' => '#3498DB',
            ],
            [
                'name' => 'Pirocinese',
                'color' => '#E74C3C',
            ],
            [
                'name' => 'Eletrocinese',
                'color' => '#F1C40F',
            ],
            [
                'name' => 'Furto de poderes',
                'color' => '#34495E',
            ],
            [
                'name' => 'Absorção de energia',
                'color' => '#8E44AD',
            ],
            [
                'name' => 'Mimetismo animal',
                'color' => '#2980B9',
            ],
            [
                'name' => 'Manipulação de metais',
                'color' => '#D35400',
            ],
            [
                'name' => 'Incorporação de elementos',
                'color' => '#27AE60',
            ],
            [
                'name' => 'Duplication',
                'color' => '#C0392B',
            ],
            [
                'name' => 'Manipulação da realidade',
                'color' => '#9B59B6',
            ],
            [
                'name' => 'Força sobre-humana',
                'color' => '#F39C12',
            ]

        ]);
    }
}
