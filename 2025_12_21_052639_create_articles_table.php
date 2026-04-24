<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('title', 150); // Article title
            $table->text('content'); // Full article
            $table->string('category', 50); // Awareness, Safety
            $table->string('photo')->nullable(); // Article image
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
