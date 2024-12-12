<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Sponsorship;
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

        foreach ($properties as $property) {
            $property->sponsorships()->attach($faker->randomElements($sponsorships, 1));
        }
    }
}
