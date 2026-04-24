<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_job_applications', function (Blueprint $table) {
            $table->id(); // PK
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->constrained('job_listings')->onDelete('cascade');
            $table->string('resume_file'); // Uploaded resume
            $table->enum('status', ['Applied','Shortlisted','Rejected','Hired'])->default('Applied');
            $table->string('photo')->nullable(); // optional photo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_job_applications');
    }
};
