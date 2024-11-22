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
    Schema::create('job', function (Blueprint $table) {
        $table->id();
        $table->string('title'); 
        $table->text('description');
        $table->string('location'); 
        $table->string('company'); 
        $table->string('job_type');
        $table->decimal('salary', 10, 2)->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};
