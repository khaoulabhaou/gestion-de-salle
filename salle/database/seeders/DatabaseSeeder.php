<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CoursSeeder;
use Database\Seeders\CoachesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            CoachesSeeder::class, // Make sure this is called first
            CoursSeeder::class,   // Now call the CoursSeeder after coaches are inserted
        ]);
    }    
}
