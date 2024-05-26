<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('bill_date');
            $table->float('breakfast', 8, 2)->default(0);
            $table->float('tea_break', 8, 2)->default(0);
            $table->float('lunch', 8, 2)->default(0);
            $table->float('dinner', 8, 2)->default(0);
            $table->float('total_bill', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_bills');
    }
}
