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

            $table->string('pateint_id')->unique();
            $table->string('pateint_name');
            $table->string('pateint_email');
            $table->string('pateint_phone');
            $table->string('pateint_address');
            $table->string('pateint_appointment_time');
            $table->string('pateint_appointment_date');
            $table->string('pateint_prefered_contact');
            $table->string('pateint_extra_info')->nullable();

            $table->string('pateint_allocated_dr_id')->nullable();
            $table->string('pateint_allocated_dr_name')->nullable();
            $table->string('pateint_allocated_dr_education')->nullable();
            $table->boolean('pateint_allocated_dr_confirmation')->default(false);
            $table->string('pateint_allocated_dr_confirmation_date_time')->nullable();
            $table->string('pateint_allocated_dr_meeting_hall')->nullable();
            $table->text('pateint_allocated_dr_meeting_message')->nullable();
            $table->text('pateint_allocated_dr_meeting_done_status')->nullable();
            $table->text('pateint_allocated_dr_meeting_done_number')->nullable();


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