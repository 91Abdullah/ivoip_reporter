<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQueueLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('queue_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('time', 26)->nullable();
			$table->string('callid', 32)->nullable();
			$table->string('queuename', 32);
			$table->string('agent', 32);
			$table->string('event', 32);
			$table->string('data1', 100);
			$table->string('data2', 100);
			$table->string('data3', 100);
			$table->string('data4', 100);
			$table->string('data5', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('queue_log');
	}

}
