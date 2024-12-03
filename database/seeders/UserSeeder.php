<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'last_name' => 'Rossi',
                'date_of_birth' => '1990-05-15',
                'email' => 'mario.rossi@example.com',
                'password' => 'password123',
            ],
            [
                'name' => 'Anna',
                'date_of_birth' => '1985-03-22',
                'email' => 'anna.bianchi@example.com',
                'password' => 'mypassword',
            ],
            [
                'name' => 'Marco',
                'last_name' => 'Verdi',
                'date_of_birth' => '2000-01-10',
                'email' => 'marco.verdi@example.com',
                'password' => 'pass456',
            ],
            [
                'name' => 'Lucia',
                'last_name' => 'Gialli',
                'date_of_birth' => '1995-07-19',
                'email' => 'lucia.gialli@example.com',
                'password' => 'securepass1',
            ],
            [
                'name' => 'Giovanni',
                'last_name' => 'Neri',
                'email' => 'giovanni.neri@example.com',
                'password' => 'johnpass88',
            ],
            [
                'name' => 'Elisa',
                'last_name' => 'Blu',
                'date_of_birth' => '1992-09-09',
                'email' => 'elisa.blu@example.com',
                'password' => 'bluepass',
            ],
            [
                'name' => 'Alessandro',
                'last_name' => 'Viola',
                'date_of_birth' => '1980-12-12',
                'email' => 'alessandro.viola@example.com',
                'password' => 'purplekey',
            ],
            [
                'name' => 'Sara',
                'last_name' => 'Bianco',
                'date_of_birth' => '1997-03-05',
                'email' => 'sara.bianco@example.com',
                'password' => 'sarapass',
            ],
            [
                'name' => 'Paolo',
                'last_name' => 'Argento',
                'date_of_birth' => '1983-06-30',
                'email' => 'paolo.argento@example.com',
                'password' => 'silver2020',
            ],
            [
                'name' => 'Chiara',
                'last_name' => 'Rame',
                'date_of_birth' => '1991-11-25',
                'email' => 'chiara.rame@example.com',
                'password' => 'copperlife',
            ],
        ];


        foreach($users as $user){
            User::create($user);
        }
    }
}