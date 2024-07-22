<?php

use App\Models\Character;
use App\Models\Weakness;
use Illuminate\Database\Seeder;

class CharacterWeaknessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characterWeaknesses = [
            'Superman' => ['Kriptonita', 'Magia poderosa', 'Combate corpo a corpo'],
            'Mulher Maravilha' => ['Magia poderosa', 'Combate corpo a corpo'],
            'Batman' => ['Vulnerável a armas de fogo', 'Combate corpo a corpo'],
            'Flash' => ['Super velocidade', 'Combate corpo a corpo', 'Medo'],
            'Lanterna Verde' => ['Medo', 'Combate corpo a corpo'],
            'Aquaman' => ['Combate corpo a corpo'],
            'Cyborg' => ['Ataques cibernéticos'],
            'Shazam' => ['Magia poderosa', 'Combate corpo a corpo'],
            'Zatanna' => ['Magia poderosa', 'Combate corpo a corpo', 'Perda de voz'],
            'Caçador de Marte' => ['Combate corpo a corpo', 'Fogo'],
            'Arqueiro Verde' => ['Combate corpo a corpo', 'Vulnerável a armas de fogo'],
            'Supergirl' => ['Kriptonita', 'Magia poderosa', 'Combate corpo a corpo'],
            'Canário Negro' => ['Combate corpo a corpo', 'Vulnerável a armas de fogo']
        ];

        foreach ($characterWeaknesses as $codename => $weakness) {
            $character = Character::where('codename', $codename)->first();
            if ($character) {
                $weaknessIds = Weakness::whereIn('name', $weakness)->pluck('id')->toArray();
                $character->weaknesses()->sync($weaknessIds);
            }
        }
    }
}
