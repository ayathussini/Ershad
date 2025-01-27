<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assistant_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assistant_id');
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('assistant_id')->references('id')->on('assistants')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistant_course');
    }
};
