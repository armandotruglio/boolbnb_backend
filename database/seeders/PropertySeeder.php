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
                'title' => 'Apartment in the historic center',
                'description' => 'Charming apartment located in the heart of the city, close to major landmarks.',
                'address' => 'Via Roma, 34',
                'latitude' => 45.069598,
                'longitude' => 7.683801,
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 75,
                'is_visible' => true,
                'thumb_url' => 'casa-storica.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Modern loft with a terrace',
                'description' => 'Stylish loft with a spacious terrace offering panoramic views of the city.',
                'address' => 'Via Po, 21',
                'latitude' => 45.068984,
                'longitude' => 7.689173,
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 60,
                'is_visible' => true,
                'thumb_url' => 'loft-terrazza.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Cozy beach house',
                'description' => 'Small house near the beach, perfect for summer holidays with family.',
                'address' => 'Via Pietro Micca, 22',
                'latitude' => 45.070496,
                'longitude' => 7.678457,
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 50,
                'is_visible' => true,
                'thumb_url' => 'casa-spiaggia.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Elegant villa with a pool',
                'description' => 'Luxurious villa with a large private garden and pool in a quiet area.',
                'address' => 'Via Corte d\'Appello, 10',
                'latitude' => 45.074020,
                'longitude' => 7.680396,
                'rooms' => 6,
                'beds' => 4,
                'bathrooms' => 3,
                'square_meters' => 220,
                'is_visible' => true,
                'thumb_url' => 'villa-piscina.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Rustic farmhouse',
                'description' => 'Traditional farmhouse with breathtaking countryside views.',
                'address' => 'Piazzale della Torre, 11',
                'latitude' => 45.340506,
                'longitude' => 11.902828,
                'rooms' => 5,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 180,
                'is_visible' => true,
                'thumb_url' => 'casale-rustico.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Compact studio apartment',
                'description' => 'Affordable studio apartment, ideal for students or single professionals.',
                'address' => 'Via G. Verdi, 21A',
                'latitude' => 45.336411,
                'longitude' => 11.903404,
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 35,
                'is_visible' => true,
                'thumb_url' => 'monolocale.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Luxury penthouse with sea view',
                'description' => 'Exclusive penthouse with panoramic sea views, private pool, and terrace.',
                'address' => 'Via Moncenisio, 7',
                'latitude' => 45.341568,
                'longitude' => 11.904222,
                'rooms' => 4,
                'beds' => 3,
                'bathrooms' => 3,
                'square_meters' => 150,
                'is_visible' => true,
                'thumb_url' => 'attico-mare.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Urban apartment close to metro',
                'description' => 'Convenient apartment located near the metro, ideal for city dwellers.',
                'address' => 'Via Tiberio Solis, 108',
                'latitude' => 41.686876,
                'longitude' => 15.383615,
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 65,
                'is_visible' => true,
                'thumb_url' => 'appartamento-metro.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Country cottage with garden',
                'description' => 'Cozy country cottage with a spacious garden, ideal for weekend getaways.',
                'address' => 'Via Soccorso, 88',
                'latitude' => 41.685144,
                'longitude' => 15.381868,
                'rooms' => 4,
                'beds' => 2,
                'bathrooms' => 2,
                'square_meters' => 100,
                'is_visible' => true,
                'thumb_url' => 'casa-campagna.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Family house in the suburbs',
                'description' => 'Spacious house in a quiet suburban area, perfect for families.',
                'address' => 'Piazza del Colosseo',
                'latitude' => 41.891034,
                'longitude' => 12.492660,
                'rooms' => 5,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 200,
                'is_visible' => true,
                'thumb_url' => 'casa-periferia.jpg',
            ],
        ];


        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}