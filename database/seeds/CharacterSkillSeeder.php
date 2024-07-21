<?php

use App\Models\Character;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CharacterSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characterSkills = [
            'Superman' => ['Voo', 'Super força', 'Resistência'],
            'Mulher Maravilha' => ['Magia', 'Super força', 'Voo'],
            'Batman' => ['Combate corpo a corpo', 'Estratégia'],
            'Flash' => ['Super velocidade', 'Resistência'],
            'Lanterna Verde' => ['Voo', 'Super força', 'Resistência'],
            'Aquaman' => ['Comunicação com animais', 'Resistência', 'Super força'],
            'Cyborg' => ['Geração de energia', 'Resistência'],
            'Shazam' => ['Magia', 'Voo', 'Super força'],
            'Lanterna Verde' => ['Voo', 'Super força', 'Resistência'],
            'Zatanna' => ['Magia', 'Telecinese'],
            'Caçador de Marte' => ['Telepatia', 'Super força', 'Intangibilidade'],
            'Arqueiro Verde' => ['Combate corpo a corpo', 'Estratégia'],
            'Supergirl' => ['Voo', 'Super força', 'Resistência'],
            'Canário Negro' => ['Grito sônico', 'Combate corpo a corpo']
        ];

        foreach ($characterSkills as $codename => $skills) {
            $character = Character::where('codename', $codename)->first();
            if ($character) {
                $skillIds = Skill::whereIn('name', $skills)->pluck('id')->toArray();
                $character->skills()->sync($skillIds);
            }
        }
    }
}
