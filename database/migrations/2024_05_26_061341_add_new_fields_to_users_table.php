<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('bup_id');
            $table->string('designation_id');
            $table->string('department_id'); 
            $table->string('emp_type_id'); 
            $table->string('section_id')->nullable(); 
            $table->string('gender')->nullable(); 
            $table->string('mobile')->nullable(); 
            $table->string('photo')->nullable(); 
            $table->string('rank')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('signature')->nullable();
            $table->string('faculty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
