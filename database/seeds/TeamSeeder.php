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
                'name' => 'Clark Kent',
                'location' => 'Nova York',
                'image' => '',
                'founded_date' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
