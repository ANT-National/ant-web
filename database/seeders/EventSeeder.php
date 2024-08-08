<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Seed the events table.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create a single event
        Event::create([
            'title' => $faker->sentence,
            'description' => $faker->paragraph,
            'objectives' => $faker->words(3, true),
            'activities' => $faker->words(4, true),
            'eventpicture' => $faker->imageUrl,
            'event_start_date' => $faker->dateTimeBetween('now', '+1 month'),
            'event_end_date' => $faker->dateTimeBetween('+1 month', '+2 months'),
            'location' => $faker->address,
            'organizer' => $faker->name,
            'capacity' => $faker->numberBetween(50, 500),
            'status' =>('upcoming'),
            'certify' => $faker->boolean,
            'programme' => $faker->words(5, true),
        ]);

        // Optionally, you can create multiple events
        // Event::factory()->count(10)->create();
    }
}
