<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallDetailRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CallDetailRecord', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('source', 20);
			$table->string('destination', 50);
			$table->string('type', 20);
			$table->string('start', 30);
			$table->string('answer', 30);
			$table->string('endtime', 30);
			$table->integer('duration');
			$table->string('disposition', 20);
			$table->string('workcode', 50);
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
