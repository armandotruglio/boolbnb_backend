<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PropertyServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $properties = Property::all();
        $services = Service::all()->pluck("id");

        foreach ($properties as $property) {
            $property->services()->attach($faker->randomElements($services, 3));
        }
    }
}