<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Table', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Name', 20);
            $table->string('Exten', 10);
            $table->string('LoginTime', 30);
            $table->integer('totDialCalls');
            $table->integer('totRcvCalls');
            $table->integer('totAnsCalls');
            $table->float('PSL');
            $table->float('GSL');
            $table->time('avgAnsSpeed');
            $table->time('avgHandTime');
            $table->time('avgTalkTime');
            $table->time('totLoginDur');
            $table->time('totTalkTime');
            $table->time('totHoldTime');
            $table->time('totNrdyTime');
            $table->time('totACWTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Table');
    }
}
