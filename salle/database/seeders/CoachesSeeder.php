<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coache;

class CoachesSeeder extends Seeder
{
    public function run()
    {
        Coache::create([
            'nom_complet' => 'William G. Stewart',
            'email' => 'william@example.com',
            'specialite' => 'Muscle Training',
        ]);

        Coache::create([
            'nom_complet' => 'Boyd C. Harris',
            'email' => 'boyd@example.com',
            'specialite' => 'Body Building',
        ]);

        Coache::create([
            'nom_complet' => 'Hector T. Daigle',
            'email' => 'hector@example.com',
            'specialite' => 'Yoga Training',
        ]);
    }
}
