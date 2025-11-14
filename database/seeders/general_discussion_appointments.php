<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class general_discussion_appointments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {

            $pre = $faker->randomElement(['male', 'female', 'other']);

            DB::table('general_discussion')->insert([
                'general_dis_patient_id' => Str::random(10),
                'general_dis_patient_name' => $faker->userName(),
                'general_dis_patient_email' => $faker->email(),
                'general_dis_patient_phone' => $faker->phoneNumber(),
                'general_dis_patient_gender' => $pre,
                'general_dis_patient_preganency_status' => $pre == "female" ? $faker->randomElement([true, false]) : false,
                'general_dis_patient_problem' => $faker->sentence(10, true),
                'general_dis_patient_age_status' => $faker->numberBetween(1, 80),
                'created_at' => $faker->dateTimeBetween('13/11/2025', '20/11/2025')
            ]);
        }
        // $table->string('general_dis_patient_id')->unique();
        // $table->string('general_dis_patient_name');
        // $table->string('general_dis_patient_email');
        // $table->string('');
        // $table->string('');
        // $table->string('')->nullable();
        // $table->string('general_dis_patient_age_status');
        // $table->string('');
        // $table->boolean('general_dis_patient_team_status')->default(false);
        // $table->boolean('general_dis_patient_cancel_status')->default(false);
        // $table->string('general_dis_patient_team_member_allocation')->nullable();
        // $table->boolean('general_dis_patient_team_chat_status')->default(false);
        // $table->string('');
    }
}
