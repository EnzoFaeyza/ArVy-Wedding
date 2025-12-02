<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');


        for ($i = 0; $i < 50; $i++) {
            Guest::create([
                'name' => $faker->name,
                'email' => $faker->unique()->userName . '@gmail.com',
                'phone' => '08' . $faker->numerify('##########'),
                'rsvp_status' => $faker->randomElement(['coming', 'not_coming']),
            ]);
        }
    }
}
