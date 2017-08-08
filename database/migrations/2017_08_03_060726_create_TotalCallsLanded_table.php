<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTotalCallsLandedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TotalCallsLanded', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->dateTime('DateTime');
			$table->integer('TotCallsLanded');
			$table->integer('totCallsAnsAfterThreshold');
			$table->integer('totCallsAbndnAfterThreshold');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TotalCallsLanded');
	}

}
