<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('title'); 
        $table->text('description');
        $table->foreignId('student_id')->constrained()->onDelete('cascade'); 
        $table->date('due_date'); 
        $table->enum('status', ['pending', 'completed'])->default('pending'); 
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('tasks');
}

};
