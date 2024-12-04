<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'user_id' => 1,
                'title' => 'Villa con vista mare',
                'description' => 'Una splendida villa situata sulla costa, con vista mozzafiato sul mare.',
                'address' => 'Via roma 1',
                'latitude' => 45.345678,
                'longitude' => 12.345678,
                'rooms' => 5,
                'beds' => 10,
                'bathrooms' => 3,
                'square_meters' => 250,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property1.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento in centro città',
                'description' => 'Moderno appartamento situato nel cuore della città, vicino a tutti i servizi.',
                'address' => 'Via roma 2',
                'latitude' => 41.902783,
                'longitude' => 12.496366,
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 120,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property2.jpg',
            ],
            [
                'user_id' => 3,
                'title' => 'Casa di campagna',
                'description' => 'Accogliente casa immersa nel verde, perfetta per una fuga dalla città.',
                'address' => 'Via roma 3',
                'latitude' => 43.769562,
                'longitude' => 11.255814,
                'rooms' => 4,
                'beds' => 6,
                'bathrooms' => 2,
                'square_meters' => 200,
                'is_visible' => false,
                'thumb_url' => 'https://example.com/images/property3.jpg',
            ],
            [
                'user_id' => 6,
                'title' => 'Monolocale economico',
                'description' => 'Perfetto per studenti o lavoratori, situato in una zona tranquilla.',
                'address' => 'Via roma 4',
                'latitude' => 44.494887,
                'longitude' => 11.342616,
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 35,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property4.jpg',
            ],
        ];

        foreach($properties as $property){
            Property::create($property);
        }
    }
}