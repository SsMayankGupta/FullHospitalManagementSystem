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
        Schema::create('NewAppointmentTable', function (Blueprint $table) {

            $table->string('patient_id')->unique();
            $table->string('patient_name');
            $table->string('patient_email');
            $table->string('patient_phone');
            $table->string('patient_address');
            $table->string('patient_appointment_time');
            $table->string('patient_appointment_date');
            $table->string('patient_prefered_contact');
            $table->string('patient_problem_statement');
            $table->string('patient_extra_info')->nullable();

            $table->string('patient_allocated_dr_id')->nullable();
            $table->string('patient_allocated_dr_name')->nullable();
            $table->string('patient_allocated_dr_education')->nullable();
            $table->boolean('patient_allocated_dr_confirmation')->default(false);
            $table->string('patient_allocated_dr_confirmation_date_time')->nullable();
            $table->string('patient_allocated_dr_meeting_hall')->nullable();
            $table->text('patient_allocated_dr_meeting_message')->nullable();
            $table->text('patient_allocated_dr_meeting_done_status')->nullable();
            $table->text('patient_allocated_dr_meeting_done_number')->nullable();
            $table->dateTime('created_at');
        });
    }

    //   ''=>$this->name,
    //         'pateint_phone'=>$this->phone,
    //         'pateint_email'=>$this->email,
    //         'pateint_address'=>$this->address,
    //         'pateint_time'=>$this->appointment_time,
    //         'pateint_date'=>$this->appointment_date,
    //         'pateint_prefered_contact'=>$this->preferred_contact,
    //         'pateint_extra_info'=>$this->notes,
    //         'created_at'=>now()->toDateTimeString(),
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
