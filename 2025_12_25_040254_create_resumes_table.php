<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('female_user_id');
            $table->string('name');
            $table->string('email');
            $table->string('resume');
            $table->timestamps();

            $table->foreign('female_user_id')
                  ->references('id')
                  ->on('female_users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resumes');
    }
};

