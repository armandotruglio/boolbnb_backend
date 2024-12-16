<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Sponsorship;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PropertySponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $properties = Property::all();
        $sponsorships = Sponsorship::all()->pluck("id");

        for ($i = 0; $i < 9; $i++) {
            $properties[$i]->sponsorships()->attach($faker->randomElements($sponsorships, 1));
        }
    }
}

