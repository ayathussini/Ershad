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
    Schema::table('tasks', function (Blueprint $table) {
        $table->unsignedBigInteger('path_id')->nullable()->after('student_id');
        $table->foreign('path_id')->references('id')->on('path_training')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('path_id'); 

        });
    }
};
