<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id(); // PK Auto Increment
            $table->string('title', 150); // Job title
            $table->string('company', 100); // Company name
            $table->string('location', 100); // Job location
            $table->text('description'); // Job details
            $table->string('salary', 50)->nullable(); // Optional
            $table->string('photo')->nullable(); // Job image / company logo
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
