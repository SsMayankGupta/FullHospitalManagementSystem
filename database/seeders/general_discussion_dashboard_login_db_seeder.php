<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use GuzzleHttp\Promise\Create;

class general_discussion_dashboard_login_db_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_IN');

        DB::table('gen_d_login_db')->insert([
            'gen_d_login_id' => Str::random(4),
            'gen_d_login_name' => "Rajat gupta ji",
            'gen_d_login_password' => "123456789",
            'gen_d_login_phone' => "7417190114",
            'gen_d_login_created_at' => now(),
        ]);

        for ($i = 0; $i < 10; $i++) {

            DB::table('gen_d_login_db')->insert([
                'gen_d_login_id' => Str::random(4),
                'gen_d_login_name' => $faker->name(),
                'gen_d_login_password' => $faker->name(),
                'gen_d_login_phone' => $faker->phoneNumber(),
                'gen_d_login_created_at' => now(),
            ]);
        }
    }
}
