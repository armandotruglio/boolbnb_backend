<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'property_id' => 1,
                'sender_email' => 'john.doe@example.com',
                'sender_name' => 'John',
                'sender_last_name' => 'Doe',
                'message' => 'I am interested in your property. Please provide more details.',
            ],
            [
                'property_id' => 2,
                'sender_email' => 'jane.smith@example.com',
                'sender_name' => 'Jane',
                'sender_last_name' => 'Smith',
                'message' => 'Can you let me know if this property is still available?',
            ],
            [
                'property_id' => 3,
                'sender_email' => 'david.jones@example.com',
                'sender_name' => 'David',
                'sender_last_name' => 'Jones',
                'message' => 'I am interested in scheduling a viewing for this property.',
            ],
            [
                'property_id' => 4,
                'sender_email' => 'lisa.brown@example.com',
                'sender_name' => 'Lisa',
                'sender_last_name' => 'Brown',
                'message' => 'Could you please provide the exact location of this property?',
            ],
            [
                'property_id' => 4,
                'sender_email' => 'michael.wilson@example.com',
                'sender_name' => 'Michael',
                'sender_last_name' => 'Wilson',
                'message' => 'What are the terms and conditions for renting this property?',
            ],
        ];

        foreach($messages as $message){
            Message::create($message);
        }

    }
}