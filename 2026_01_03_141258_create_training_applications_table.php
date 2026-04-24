<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('training_applications', function (Blueprint $table) {
            $table->id();

            // Reference to the female user
            $table->foreignId('user_id')
                  ->constrained('female_users')
                  ->onDelete('cascade');

            // Reference to the training program
            $table->foreignId('training_id')
                  ->constrained('trainings')
                  ->onDelete('cascade');

            // Snapshot of the user info at time of application
            $table->string('name');
            $table->string('email');
            $table->string('phone');

            // Payment mode
            $table->string('payment_mode');

            // Application status
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_applications');
    }
};
