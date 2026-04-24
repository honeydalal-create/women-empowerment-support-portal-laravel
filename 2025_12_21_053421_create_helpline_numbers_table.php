<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('helpline_numbers', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('name', 100); // Helpline name
            $table->string('number', 20); // Contact number
            $table->text('description')->nullable(); // Optional info
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('helpline_numbers');
    }
};
