<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('female_users')->onDelete('cascade');
            $table->string('name');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('phone');
            $table->string('email');
            $table->text('message')->nullable();
            $table->string('resume')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
