<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            general_discussion_dashboard_login_db_seeder::class,
            general_discussion_appointments::class,
            DoctorsRegistrationSeeder::class,
            new_appointment_table_seeder::class,
        ]);
    }
}
