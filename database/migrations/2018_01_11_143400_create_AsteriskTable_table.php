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
			$table->string('ManagerUsername')->default('asterisk');
			$table->string('ManagerPassword')->default('asterisk');
			$table->integer('ManagerPort')->default(5038);
			$table->string('Queue')->default('100');
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
