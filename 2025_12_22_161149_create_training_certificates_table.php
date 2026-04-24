<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('training_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('female_users')->onDelete('cascade');
            $table->foreignId('training_application_id')->constrained('training_applications')->onDelete('cascade');
            $table->string('certificate_file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_certificates');
    }
};
