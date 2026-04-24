<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('helpline_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);      // Helpline Name
            $table->string('number', 20);     // Phone Number
            $table->text('description')->nullable(); // Optional description
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('helpline_numbers');
    }
};
