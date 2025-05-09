<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cour; // Assuming you have the Cour model
use App\Models\Coache; // Assuming you have the Coache model

class CoursSeeder extends Seeder
{
    public function run()
    {
        Cour::create([
            'coach_id' => Coache::where('specialite', 'Yoga Training')->first()->id,
            'capacite_max' => 30,
            'titre' => 'Yoga for Beginners',
            'description' => 'Learn the basics of yoga and how to stretch effectively.',
            'duree' => 45,
            'prix' => 19.99,
            'statut' => 'PLANIFIE',
        ]);
    }
}
