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

            // Mon, Tue, Wed, Thu, Fri, Sat, Sun

            $table->boolean('Mon')->default(false);
            $table->boolean('Tue')->default(false);
            $table->boolean('Wed')->default(false);
            $table->boolean('Thu')->default(false);
            $table->boolean('Fri')->default(false);
            $table->boolean('Sat')->default(false);
            $table->boolean('Sun')->default(false);

            $table->string('Mon_start_time')->nullable();
            $table->string('Mon_end_time')->nullable();

            $table->string('Tue_start_time')->nullable();
            $table->string('Tue_end_time')->nullable();

            $table->string('Wed_start_time')->nullable();
            $table->string('Wed_end_time')->nullable();

            $table->string('Thu_start_time')->nullable();
            $table->string('Thu_end_time')->nullable();

            $table->string('Fri_start_time')->nullable();
            $table->string('Fri_end_time')->nullable();

            $table->string('Sat_start_time')->nullable();
            $table->string('Sat_end_time')->nullable();

            $table->string('Sun_start_time')->nullable();
            $table->string('Sun_end_time')->nullable();

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
