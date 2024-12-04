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
                'name' => 'Mario',
                'last_name' => 'Rossi',
                'date_of_birth' => '1990-05-15',
                'email' => 'mario.rossi@example.com',
                'password' => 'password123',
            ],
            [
                'name' => 'Anna',
                'last_name' => 'Bianchi',
                'date_of_birth' => '1985-03-22',
                'email' => 'anna.bianchi@example.com',
                'password' => 'mypassword',
            ],
        ];


        foreach($users as $user){
            User::create($user);
        }
    }
}