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
        Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name_ar')->nullable();
        $table->string('name_en')->nullable();
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('university')->nullable();
        $table->string('faculty')->nullable();
        $table->string('nationality')->nullable();
        $table->string('training_path')->nullable();
        $table->string('password')->nullable();
        $table->text('personality_test_results')->nullable();
        $table->text('english_level_test_results')->nullable();
        $table->unsignedBigInteger('agent_id')->nullable();
        $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
