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
                'property_id' => 5,
                'sender_email' => 'emma.johnson@example.com',
                'sender_name' => 'Emma',
                'sender_last_name' => 'Johnson',
                'message' => 'I am interested in this property. Is it still available?',
                'created_at' => '2023-08-15 14:32',
            ],
            [
                'property_id' => 6,
                'sender_email' => 'oliver.white@example.com',
                'sender_name' => 'Oliver',
                'sender_last_name' => 'White',
                'message' => 'Could you provide additional photos of the property?',
                'created_at' => '2024-03-12 09:45',
            ],
            [
                'property_id' => 7,
                'sender_email' => 'sophia.martin@example.com',
                'sender_name' => 'Sophia',
                'sender_last_name' => 'Martin',
                'message' => 'Does this property include parking space?',
                'created_at' => '2023-11-10 08:15',
            ],
            [
                'property_id' => 8,
                'sender_email' => 'jack.thomas@example.com',
                'sender_name' => 'Jack',
                'sender_last_name' => 'Thomas',
                'message' => 'Can you confirm the square footage of this property?',
                'created_at' => '2024-07-21 16:47',
            ],
            [
                'property_id' => 9,
                'sender_email' => 'amelia.moore@example.com',
                'sender_name' => 'Amelia',
                'sender_last_name' => 'Moore',
                'message' => 'I am very interested. Can we arrange a viewing soon?',
                'created_at' => '2024-01-09 10:23',
            ],
            [
                'property_id' => 10,
                'sender_email' => 'lucas.taylor@example.com',
                'sender_name' => 'Lucas',
                'sender_last_name' => 'Taylor',
                'message' => 'What is the monthly rent for this property?',
                'created_at' => '2024-06-30 12:14',
            ],
            [
                'property_id' => 11,
                'sender_email' => 'mia.anderson@example.com',
                'sender_name' => 'Mia',
                'sender_last_name' => 'Anderson',
                'message' => 'Can you provide information about nearby schools?',
                'created_at' => '2023-12-05 18:32',
            ],
            [
                'property_id' => 12,
                'sender_email' => 'charlie.evans@example.com',
                'sender_name' => 'Charlie',
                'sender_last_name' => 'Evans',
                'message' => 'Is there a private garden included?',
                'created_at' => '2024-02-17 07:25',
            ],
            [
                'property_id' => 13,
                'sender_email' => 'harper.hall@example.com',
                'sender_name' => 'Harper',
                'sender_last_name' => 'Hall',
                'message' => 'How old is the building? Does it require any renovation?',
                'created_at' => '2024-10-08 20:11',
            ],
            [
                'property_id' => 14,
                'sender_email' => 'henry.brown@example.com',
                'sender_name' => 'Henry',
                'sender_last_name' => 'Brown',
                'message' => 'I would like to make an offer for this property.',
                'created_at' => '2023-07-18 14:04',
            ],
            [
                'property_id' => 15,
                'sender_email' => 'ella.wright@example.com',
                'sender_name' => 'Ella',
                'sender_last_name' => 'Wright',
                'message' => 'Are pets allowed in this property?',
                'created_at' => '2023-10-25 09:36',
            ],
            [
                'property_id' => 16,
                'sender_email' => 'james.clark@example.com',
                'sender_name' => 'James',
                'sender_last_name' => 'Clark',
                'message' => 'Is this property available for short-term rental?',
                'created_at' => '2024-05-04 11:45',
            ],
            [
                'property_id' => 17,
                'sender_email' => 'ava.lee@example.com',
                'sender_name' => 'Ava',
                'sender_last_name' => 'Lee',
                'message' => 'Can you confirm the exact location?',
                'created_at' => '2024-03-28 22:30',
            ],
            [
                'property_id' => 18,
                'sender_email' => 'logan.harris@example.com',
                'sender_name' => 'Logan',
                'sender_last_name' => 'Harris',
                'message' => 'What is the neighborhood like?',
                'created_at' => '2024-09-14 16:50',
            ],
            [
                'property_id' => 19,
                'sender_email' => 'lily.martin@example.com',
                'sender_name' => 'Lily',
                'sender_last_name' => 'Martin',
                'message' => 'Are there any additional fees I should know about?',
                'created_at' => '2023-09-22 17:12',
            ],
            [
                'property_id' => 20,
                'sender_email' => 'benjamin.jones@example.com',
                'sender_name' => 'Benjamin',
                'sender_last_name' => 'Jones',
                'message' => 'What are the energy efficiency details for this property?',
                'created_at' => '2024-06-16 13:47',
            ],
            [
                'property_id' => 1,
                'sender_email' => 'grace.taylor@example.com',
                'sender_name' => 'Grace',
                'sender_last_name' => 'Taylor',
                'message' => 'I would like more information about the amenities included.',
                'created_at' => '2023-11-03 08:24',
            ],
            [
                'property_id' => 2,
                'sender_email' => 'alex.green@example.com',
                'sender_name' => 'Alex',
                'sender_last_name' => 'Green',
                'message' => 'Is the property furnished?',
                'created_at' => '2024-07-19 15:11',
            ],
            [
                'property_id' => 3,
                'sender_email' => 'scarlett.baker@example.com',
                'sender_name' => 'Scarlett',
                'sender_last_name' => 'Baker',
                'message' => 'Are there public transport options nearby?',
                'created_at' => '2024-05-22 19:33',
            ],
            [
                'property_id' => 4,
                'sender_email' => 'ethan.adams@example.com',
                'sender_name' => 'Ethan',
                'sender_last_name' => 'Adams',
                'message' => 'Can I schedule a visit for next week?',
                'created_at' => '2023-12-01 10:50',
            ],
            [
                'property_id' => 5,
                'sender_email' => 'zoe.foster@example.com',
                'sender_name' => 'Zoe',
                'sender_last_name' => 'Foster',
                'message' => 'What is the security deposit for this property?',
                'created_at' => '2024-03-05 14:02',
            ],
            [
                'property_id' => 6,
                'sender_email' => 'isaac.barnes@example.com',
                'sender_name' => 'Isaac',
                'sender_last_name' => 'Barnes',
                'message' => 'Can this property be rented out for events?',
                'created_at' => '2023-11-17 08:45',
            ],
            [
                'property_id' => 7,
                'sender_email' => 'hannah.morris@example.com',
                'sender_name' => 'Hannah',
                'sender_last_name' => 'Morris',
                'message' => 'What utilities are included in the rent?',
                'created_at' => '2024-02-01 18:40',
            ],
            [
                'property_id' => 8,
                'sender_email' => 'sebastian.king@example.com',
                'sender_name' => 'Sebastian',
                'sender_last_name' => 'King',
                'message' => 'I am very interested in this property. Can we discuss further?',
                'created_at' => '2024-10-14 12:19',
            ],
            [
                'property_id' => 9,
                'sender_email' => 'madison.scott@example.com',
                'sender_name' => 'Madison',
                'sender_last_name' => 'Scott',
                'message' => 'What is the cancellation policy for bookings?',
                'created_at' => '2023-10-02 13:42',
            ],
            [
                'property_id' => 10,
                'sender_email' => 'daniel.roberts@example.com',
                'sender_name' => 'Daniel',
                'sender_last_name' => 'Roberts',
                'message' => 'How far is the nearest grocery store?',
                'created_at' => '2024-08-18 17:05',
            ],
            [
                'property_id' => 11,
                'sender_email' => 'chloe.carter@example.com',
                'sender_name' => 'Chloe',
                'sender_last_name' => 'Carter',
                'message' => 'What is the minimum stay duration for this property?',
                'created_at' => '2024-06-10 11:27',
            ],
            [
                'property_id' => 12,
                'sender_email' => 'samuel.ward@example.com',
                'sender_name' => 'Samuel',
                'sender_last_name' => 'Ward',
                'message' => 'Can you provide more information about the heating system?',
                'created_at' => '2023-09-13 15:21',
            ],
            [
                'property_id' => 20,
                'sender_email' => 'zachary.turner@example.com',
                'sender_name' => 'Zachary',
                'sender_last_name' => 'Turner',
                'message' => 'Can I negotiate the rent price?',
                'created_at' => '2024-06-28 10:44',
            ],
            [
                'property_id' => 2,
                'sender_email' => 'george.anderson@example.com',
                'sender_name' => 'George',
                'sender_last_name' => 'Anderson',
                'message' => 'Does the property include a basement?',
                'created_at' => '2024-02-15 14:02',
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }

    }
}