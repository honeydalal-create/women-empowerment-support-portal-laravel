<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_certificates', function (Blueprint $table) {
            $table->id();

            // Reference to the training application
            $table->foreignId('application_id')->constrained('training_applications')->onDelete('cascade');

            // Reference to the female user (snapshot for convenience)
            $table->foreignId('user_id')->constrained('female_users')->onDelete('cascade');

            // Training program name (copied from application)
            $table->string('training_program');

            // Certificate file name / path
            $table->string('certificate_file');

            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_certificates');
    }
};
