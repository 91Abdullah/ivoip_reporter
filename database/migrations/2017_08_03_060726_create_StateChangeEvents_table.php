<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateChangeEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('StateChangeEvents', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Name', 20);
			$table->string('Exten', 10);
			$table->string('State', 20);
			$table->string('Reason', 20);
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
