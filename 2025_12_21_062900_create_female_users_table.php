<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('female_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 15)->default(); // default value
            $table->enum('gender', ['Female','Other'])->default('Female');
            $table->date('date_of_birth')->default('2000-01-01'); // default DOB
            $table->string('city', 50)->default();
            $table->string('state', 50)->default();
            $table->string('occupation', 100)->default();
            $table->text('address')->default();
            $table->string('profile_photo')->default(); // default photo
            $table->string('password');
            $table->enum('role', ['Visitor','User','Admin'])->default('Visitor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('female_users');
    }
};
