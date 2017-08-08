<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCdrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cdr', function(Blueprint $table)
		{
			$table->string('accountcode', 20)->nullable();
			$table->string('src', 80)->nullable();
			$table->string('dst', 80)->nullable();
			$table->string('dcontext', 80)->nullable();
			$table->string('clid', 80)->nullable();
			$table->string('channel', 80)->nullable();
			$table->string('dstchannel', 80)->nullable();
			$table->string('lastapp', 80)->nullable();
			$table->string('lastdata', 80)->nullable();
			$table->dateTime('start')->nullable();
			$table->dateTime('answer')->nullable();
			$table->dateTime('endtime')->nullable();
			$table->integer('duration')->nullable();
			$table->integer('billsec')->nullable();
			$table->string('disposition', 20)->nullable();
			$table->string('amaflags', 16)->nullable();
			$table->string('uniqueid', 150)->nullable();
			$table->string('userfield', 256)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cdr');
	}

}
