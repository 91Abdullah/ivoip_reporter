<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Logins', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->string('Name', 50);
			$table->string('Extension', 20);
			$table->string('Secret', 20);
			$table->char('SystemType', 2)->default("ob");
			$table->char('SystemRights', 1)->default("A");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Logins');
	}

}
