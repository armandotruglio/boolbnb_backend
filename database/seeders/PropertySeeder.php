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
                'address' => '12 Garibaldi Street',
                'latitude' => 41.890251,
                'longitude' => 12.492373,
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 75,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property1.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Modern loft with a terrace',
                'description' => 'Stylish loft with a spacious terrace offering panoramic views of the city.',
                'address' => '45 Main Street',
                'latitude' => 48.856613,
                'longitude' => 2.352222,
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 60,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property2.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Cozy beach house',
                'description' => 'Small house near the beach, perfect for summer holidays with family.',
                'address' => 'Beach Road 21',
                'latitude' => 36.778259,
                'longitude' => -119.417931,
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 50,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property3.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Elegant villa with a pool',
                'description' => 'Luxurious villa with a large private garden and pool in a quiet area.',
                'address' => '10 Pine Street',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'rooms' => 6,
                'beds' => 4,
                'bathrooms' => 3,
                'square_meters' => 220,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property4.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Rustic farmhouse',
                'description' => 'Traditional farmhouse with breathtaking countryside views.',
                'address' => '3 Hillside Lane',
                'latitude' => 51.165691,
                'longitude' => 10.451526,
                'rooms' => 5,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 180,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property5.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Compact studio apartment',
                'description' => 'Affordable studio apartment, ideal for students or single professionals.',
                'address' => '20 Maple Avenue',
                'latitude' => 37.774929,
                'longitude' => -122.419416,
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 35,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property6.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Luxury penthouse with sea view',
                'description' => 'Exclusive penthouse with panoramic sea views, private pool, and terrace.',
                'address' => '8 Ocean Drive',
                'latitude' => 25.761681,
                'longitude' => -80.191788,
                'rooms' => 4,
                'beds' => 3,
                'bathrooms' => 3,
                'square_meters' => 150,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property7.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Urban apartment close to metro',
                'description' => 'Convenient apartment located near the metro, ideal for city dwellers.',
                'address' => '22 Elm Street',
                'latitude' => 40.730610,
                'longitude' => -73.935242,
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 65,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property8.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Country cottage with garden',
                'description' => 'Cozy country cottage with a spacious garden, ideal for weekend getaways.',
                'address' => '14 Forest Path',
                'latitude' => 43.769871,
                'longitude' => 11.255576,
                'rooms' => 4,
                'beds' => 2,
                'bathrooms' => 2,
                'square_meters' => 100,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property9.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Family house in the suburbs',
                'description' => 'Spacious house in a quiet suburban area, perfect for families.',
                'address' => '19 Willow Lane',
                'latitude' => 39.739236,
                'longitude' => -104.990251,
                'rooms' => 5,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 200,
                'is_visible' => true,
                'thumb_url' => 'https://example.com/images/property10.jpg',
            ],
        ];


        foreach($properties as $property){
            Property::create($property);
        }
    }
}