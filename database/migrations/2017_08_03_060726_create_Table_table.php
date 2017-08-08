<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Table', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Name', 20);
			$table->string('Exten', 10);
			$table->string('LoginTime', 30);
			$table->integer('totDialCalls');
			$table->integer('totRcvCalls');
			$table->integer('totAnsCalls');
			$table->float('PSL', 53, 0);
			$table->float('GSL', 53, 0);
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
