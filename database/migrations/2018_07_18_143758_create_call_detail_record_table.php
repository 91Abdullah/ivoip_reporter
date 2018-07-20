<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallDetailRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallDetailRecord', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('source');
            $table->string('destination');
            $table->string('type');
            $table->string('start');
            $table->string('answer');
            $table->string('endtime');
            $table->integer('duration');
            $table->string('disposition');
            $table->string('workcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CallDetailRecord');
    }
}
