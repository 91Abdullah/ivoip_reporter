<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateChangeEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StateChangeEvents', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Name', 20);
            $table->string('Exten', 10);
            $table->string('State', 20);
            $table->string('Reason', 30);
            $table->string('Datetime', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('StateChangeEvents');
    }
}
