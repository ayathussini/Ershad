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
    Schema::create('path_training', function (Blueprint $table) {
        $table->id(); 
        $table->string('name'); 
        $table->text('description')->nullable(); 
        $table->integer('duration')->nullable();
        $table->string('level')->nullable(); 
        $table->softDeletes();
        $table->timestamps(); 
    });
}

public function down()
{
    Schema::dropIfExists('path_training');
}

};
