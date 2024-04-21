<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\Character\CharacterSexEnum;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            [
                'name' => 'Clark Kent',
                'codename' => 'Superman',
                'sex' => CharacterSexEnum::MALE,
                'age' => '25',
                'avatar' => '',
                'weakness' => 'Kriptonita',
                'affiliate' => 'Kara Zor-El',
                'pair' => 'Lois Lane',
                'planet' => 'Terra',
                'city' => 'Metrópolis',
                'team_id' => 1,
                'squad_id' => null,
            ],
            [
                'name' => 'Diana Price',
                'codename' => 'Mulher Maravilha',
                'sex' => CharacterSexEnum::FEMALE,
                'age' => '150',
                'avatar' => '',
                'weakness' => 'Magia',
                'affiliate' => 'Hipólita',
                'pair' => 'Steve Trevor',
                'planet' => 'Terra',
                'city' => 'Temyscera',
                'team_id' => 1,
                'squad_id' => null,
            ],
            [
                'name' => 'Bruce Wayne',
                'codename' => 'Batman',
                'sex' => CharacterSexEnum::MALE,
                'age' => '29',
                'avatar' => '',
                'weakness' => 'Combate, estratégia',
                'affiliate' => 'Alfred',
                'pair' => 'Selina Kyle',
                'planet' => 'Terra',
                'city' => 'Gotham',
                'team_id' => 1,
                'squad_id' => null,
            ],
        ]);
    }
}
