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
       Schema::create('path_student', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('student_id');
    $table->unsignedBigInteger('path_id');
    $table->timestamps();

    $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    $table->foreign('path_id')->references('id')->on('path_training')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('path_student');
    }
};
