<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('general_discussion', function (Blueprint $table) {
            $table->string('general_dis_patient_id')->unique();
            $table->string('general_dis_patient_name');
            $table->string('general_dis_patient_email');
            $table->string('general_dis_patient_phone');
            $table->string('general_dis_patient_gender');
            $table->string('general_dis_patient_preganency_status')->nullable();
            $table->string('general_dis_patient_age_status');
            $table->string('general_dis_patient_problem');
            $table->boolean('general_dis_patient_team_status')->default(false);
            $table->boolean('general_dis_patient_cancel_status')->default(false);
            $table->string('general_dis_patient_team_member_allocation')->nullable();
            $table->boolean('general_dis_patient_team_chat_status')->default(false);
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_discussion');
    }
};