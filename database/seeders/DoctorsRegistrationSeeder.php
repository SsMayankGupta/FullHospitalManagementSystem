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

                'Mon' => $faker->randomElement([true, false]),
                'Tue' => $faker->randomElement([true, false]),
                'Wed' => $faker->randomElement([true, false]),
                'Thu' => $faker->randomElement([true, false]),
                'Fri' => $faker->randomElement([true, false]),
                'Sat' => $faker->randomElement([true, false]),
                'Sun' => $faker->randomElement([true, false]),

                'Mon_start_time' => $faker->time('H:i'),
                'Mon_end_time' => $faker->time('H:i'),
                'Tue_start_time' => $faker->time('H:i'),
                'Tue_end_time' => $faker->time('H:i'),
                'Wed_start_time' => $faker->time('H:i'),
                'Wed_end_time' => $faker->time('H:i'),
                'Thu_start_time' => $faker->time('H:i'),
                'Thu_end_time' => $faker->time('H:i'),
                'Fri_start_time' => $faker->time('H:i'),
                'Fri_end_time' => $faker->time('H:i'),
                'Sat_start_time' => $faker->time('H:i'),
                'Sat_end_time' => $faker->time('H:i'),
                'Sun_start_time' => $faker->time('H:i'),
                'Sun_end_time' => $faker->time('H:i'),

            ]);
        }
    }
}
