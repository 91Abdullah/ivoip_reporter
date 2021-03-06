<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsolidatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Consolidated', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Name', 50);
            $table->string('Extension', 20);
            $table->string('LoginTime', 30);
            $table->string('LogoutTime', 30);
            $table->string('TotalLoginTime', 20);
            $table->string('TotalReadyTime', 20);
            $table->string('TotalNtRdyTime', 20);
            $table->string('TotalTalkTime', 20);
            $table->string('TotalIdleTime', 20);
            $table->string('TotalHoldTime', 20);
            $table->string('TotalACWTime', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Consolidated');
    }
}
