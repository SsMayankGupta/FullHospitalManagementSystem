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
        Schema::create('gen_d_login_db', function (Blueprint $table) {
            $table->string('gen_d_login_id')->unique();
            $table->string('gen_d_login_name');
            $table->string('gen_d_login_password');
            $table->string('gen_d_login_phone');
            $table->string('gen_d_login_created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_discussion_dashboard_login_db');
    }
};
