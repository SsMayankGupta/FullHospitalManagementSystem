<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class new_appointment_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('NewAppointmentTable')->insert([
                'patient_id' => (string) Str::random(10),
                'patient_name' => $faker->name,
                'patient_email' => $faker->unique()->safeEmail,
                'patient_phone' => $faker->phoneNumber,
                'patient_address' => $faker->address,
                'patient_appointment_time' => $faker->time(),
                'patient_appointment_date' => $faker->date(),
                'patient_prefered_contact' => $faker->randomElement(['email', 'phone']),
                'patient_problem_statement' => $faker->sentence,
                'patient_extra_info' => $faker->optional()->text,

                // 'patient_allocated_dr_id' => $faker->optional()->regexify('[A-Z]{3}[0-9]{3}'),
                // 'patient_allocated_dr_name' => $faker->optional()->name,
                // 'patient_allocated_dr_education' => $faker->optional()->randomElement(['MBBS', 'MD', 'DO']),
                // 'patient_allocated_dr_confirmation' => $faker->boolean,
                // 'patient_allocated_dr_confirmation_date_time' => $faker->optional()->dateTime()->format('Y-m-d H:i:s'),
                // 'patient_allocated_dr_meeting_hall' => $faker->optional()->word,
                // 'patient_allocated_dr_meeting_message' => $faker->optional()->text,
                // 'patient_allocated_dr_meeting_done_status' => $faker->optional()->randomElement(['completed', 'pending']),
                // 'patient_allocated_dr_meeting_done_number' => $faker->optional()->numerify('DR-###'),
                'created_at' => now(),
            ]);
        }
    }
}
