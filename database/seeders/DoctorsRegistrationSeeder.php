<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\doctors_registration;

class DoctorsRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $i) {

            doctors_registration::create([
                'dr_id' => 'DR' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'dr_name' => $faker->name,
                'dr_email' => $faker->unique()->safeEmail,
                'dr_phone_one' => $faker->phoneNumber,
                'dr_phone_two' => $faker->optional()->phoneNumber,
                'dr_education' => $faker->text(40),
                'dr_department' => $faker->randomElement(['Cardiology', 'Neurology', 'Orthopedics', 'Pediatrics', 'Dermatology']),
                'dr_type' => $faker->randomElement(['Full-time', 'Part-time', 'Visiting']),
                'dr_message_to_pateints' => $faker->sentence,
                'dr_feedback' => $faker->sentence,
                'dr_feedback_rating_number' => $faker->randomFloat(1, 1, 5),
                'dr_salary' => $faker->numberBetween(70000, 300000),
                'dr_working_hours' => '9am - 5pm',

                'mon' => $faker->optional()->randomElement(['available', 'not available']),
                'tue' => $faker->optional()->randomElement(['available', 'not available']),
                'wed' => $faker->optional()->randomElement(['available', 'not available']),
                'thus' => $faker->optional()->randomElement(['available', 'not available']),
                'frid' => $faker->optional()->randomElement(['available', 'not available']),
                'satur' => $faker->optional()->randomElement(['available', 'not available']),
                'sun' => $faker->optional()->randomElement(['available', 'not available']),

                'mon_start_time' => $faker->optional()->time('H:i'),
                'mon_end_time' => $faker->optional()->time('H:i'),
                'tue_start_time' => $faker->optional()->time('H:i'),
                'tue_end_time' => $faker->optional()->time('H:i'),
                'wed_start_time' => $faker->optional()->time('H:i'),
                'wed_end_time' => $faker->optional()->time('H:i'),
                'thus_start_time' => $faker->optional()->time('H:i'),
                'thus_end_time' => $faker->optional()->time('H:i'),
                'fri_start_time' => $faker->optional()->time('H:i'),
                'fri_end_time' => $faker->optional()->time('H:i'),
                'satur_start_time' => $faker->optional()->time('H:i'),
                'satur_end_time' => $faker->optional()->time('H:i'),
                'sun_start_time' => $faker->optional()->time('H:i'),
                'sun_end_time' => $faker->optional()->time('H:i'),

                'extraday' => $faker->optional()->word,
                'extraday_start_time' => $faker->optional()->time('H:i'),
                'extraday_end_time' => $faker->optional()->time('H:i'),
            ]);
        }
    }
}
