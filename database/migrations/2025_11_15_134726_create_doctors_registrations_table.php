<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors_registrations', function (Blueprint $table) {

            $table->string('dr_id');
            $table->string('dr_name');
            $table->string('dr_email');
            $table->string('dr_phone_one');
            $table->string('dr_phone_two')->nullable();
            $table->longText('dr_education');
            $table->string('dr_department');
            $table->string('dr_type');
            $table->string('dr_message_to_pateints');
            $table->string('dr_feedback');
            $table->string('dr_feedback_rating_number');
            $table->string('dr_salary');
            $table->string('dr_working_hours');

            $table->string('mon')->nullable();
            $table->string('tue')->nullable();
            $table->string('wed')->nullable();
            $table->string('thus')->nullable();
            $table->string('frid')->nullable();
            $table->string('satur')->nullable();
            $table->string('sun')->nullable();

            $table->string('mon_start_time')->nullable();
            $table->string('mon_end_time')->nullable();

            $table->string('tue_start_time')->nullable();
            $table->string('tue_end_time')->nullable();

            $table->string('wed_start_time')->nullable();
            $table->string('wed_end_time')->nullable();

            $table->string('thus_start_time')->nullable();
            $table->string('thus_end_time')->nullable();

            $table->string('fri_start_time')->nullable();
            $table->string('fri_end_time')->nullable();

            $table->string('satur_start_time')->nullable();
            $table->string('satur_end_time')->nullable();

            $table->string('sun_start_time')->nullable();
            $table->string('sun_end_time')->nullable();

            $table->string('extraday')->nullable();
            $table->string('extraday_start_time')->nullable();
            $table->string('extraday_end_time')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_registrations');
    }
};
