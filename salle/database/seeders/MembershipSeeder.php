<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        Membership::create([
            'name' => 'Basic',
            'description' => 'Just the essentials.',
            'price' => 19.00,
            'duration' => 1,
        ]);

        Membership::create([
            'name' => 'Standard',
            'description' => 'Best for most people.',
            'price' => 29.00,
            'duration' => 3,
        ]);

        Membership::create([
            'name' => 'Premium',
            'description' => 'All access + perks.',
            'price' => 39.00,
            'duration' => 6,
        ]);
    }
}
