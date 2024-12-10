<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'WiFi Connection',
                'icon_url' => 'fa-solid fa-wifi',
            ],
            [
                'name' => 'Parking Spot',
                'icon_url' => 'fa-solid fa-square-parking',
            ],
            [
                'name' => 'Swimming Pool',
                'icon_url' => 'fa-solid fa-person-swimming',
            ],
            [
                'name' => 'Gatehouse',
                'icon_url' => 'fa-solid fa-bell-concierge',
            ],
            [
                'name' => 'Sauna',
                'icon_url' => 'fa-solid fa-spa',
            ],
            [
                'name' => 'Sea View',
                'icon_url' => 'fa-solid fa-water',
            ],
            [
                'name' => 'Gym',
                'icon_url' => 'fa-solid fa-dumbbell',
            ],
            [
                'name' => 'Restaurant',
                'icon_url' => 'fa-solid fa-utensils',
            ],
            [
                'name' => 'Animals Allowed',
                'icon_url' => 'fa-solid fa-paw',
            ],
            [
                'name' => 'heating',
                'icon_url' => 'fa-solid fa-fire',
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
