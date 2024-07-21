<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'name' => 'Liga da Justiça',
                'location' => 'Torre de Vigilância',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Sociedade da Justiça da América',
                'location' => 'Nova York',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Novos Titãs',
                'location' => 'Titans Tower, São Francisco',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Esquadrão Suicida',
                'location' => 'Belle Reve Penitentiary',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Patrulha do Destino',
                'location' => 'Dayton Manor',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Tropa dos Lanternas Verdes',
                'location' => 'Oa',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Corporação Batman',
                'location' => 'Gotham City',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Renegados',
                'location' => 'Gotham City',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Os Sete Soldados da Vitória',
                'location' => 'Nova York',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Legião dos Super-Heróis',
                'location' => 'Século 31, Metropolis',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Os Jovens Titãs',
                'location' => 'Titans Tower, São Francisco',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Liga da Justiça Sombria',
                'location' => 'Casa dos Mistérios',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Aves de Rapina',
                'location' => 'Gotham City',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Cavaleiros da Trevas',
                'location' => 'Gotham City',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Sociedade Secreta dos Supervilões',
                'location' => 'Móvel',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Legião do Mal',
                'location' => 'Sala do Destino',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Gangue da Injustiça',
                'location' => 'Móvel',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Liga da Injustiça',
                'location' => 'Terra-3',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Quarteto Terrível',
                'location' => 'Gotham City',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Os Renegados',
                'location' => 'Markovia',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'A Ordem de São Dumas',
                'location' => 'Gotham City',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ]
        ]);
    }
}
