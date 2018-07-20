<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Settings', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('name');
            $table->string('extension');
            $table->integer('Port')->default(5060);
            $table->boolean('AAFlag')->default(false);
            $table->boolean('CFBFlag')->default(false);
            $table->string('CFBNumber')->default('');
            $table->boolean('CFNRFlag')->default(false);
            $table->string('CFNRNumber')->default('');
            $table->boolean('CFUFlag')->default(false);
            $table->string('CFUNumber')->default('');
            $table->boolean('DNDFlag')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Settings', function (Blueprint $table) {
            //
        });
    }
}
