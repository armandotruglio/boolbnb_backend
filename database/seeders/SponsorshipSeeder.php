<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            [
                'name' => 'Standard',
                'duration' => 24,
                'price' => 2.99,
            ],
            [
                'name' => 'Plus',
                'duration' => 72,
                'price' => 5.99,
            ],
            [
                'name' => 'Premium',
                'duration' => 144,
                'price' => 9.99,
            ],
        ];

        foreach ($sponsorships as $sponsorship) {
            Sponsorship::create($sponsorship);
        }
    }
}
