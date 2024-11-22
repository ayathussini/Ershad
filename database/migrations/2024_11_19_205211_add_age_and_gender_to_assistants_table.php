<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeAndGenderToAssistantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assistants', function (Blueprint $table) {
            $table->integer('age')->nullable()->after('name_en'); 
            $table->enum('gender', ['male', 'female'])->nullable()->after('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assistants', function (Blueprint $table) {
            $table->dropColumn(['age', 'gender']); 
        });
    }
}
