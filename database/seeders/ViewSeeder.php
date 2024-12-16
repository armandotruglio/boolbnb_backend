<?php

namespace Database\Seeders;

use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = DB::table('properties')->pluck('id'); // Ottieni tutti gli ID delle proprietà

        $views = [];

        foreach ($properties as $propertyId) {
            $viewsCount = rand(20, 1000); // Genera un numero casuale di visualizzazioni tra 20 e 1000

            for ($i = 0; $i < $viewsCount; $i++) {
                $views[] = [
                    'property_id' => $propertyId,
                    'user_ip' => $this->generateRandomIp(),
                    'created_at' => Carbon::now()->subDays(rand(0, 1000)), // Data casuale negli ultimi 60 giorni
                    'updated_at' => Carbon::now()->subDays(rand(0, 1000)),
                ];
            }
        }

        foreach ($views as $view) {
            View::create($view);
        }
    }

    private function generateRandomIp(): string
    {
        // Genera un indirizzo IP casuale
        return implode('.', [
            rand(0, 255),
            rand(0, 255),
            rand(0, 255),
            rand(0, 255),
        ]);
    }
}
