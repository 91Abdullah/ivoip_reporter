<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsteriskTableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('AsteriskTable', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('ProxyIP', 20);
			$table->integer('Port');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('AsteriskTable');
	}

}
