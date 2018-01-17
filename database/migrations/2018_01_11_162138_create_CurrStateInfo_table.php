<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrStateInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CurrStateInfo', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->string('Name', 50);
			$table->string('Extension', 20);
			$table->string('LoginTime', 30)->default(" ");
			$table->string('LogoutTime', 30)->default(" ");
			$table->boolean('IsLogin')->default(false);
			$table->boolean('IsReady')->default(false);
			$table->boolean('OnCall')->default(false);
			$table->boolean('Idle')->default(false);
			$table->boolean('ACW')->default(false);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('CurrStateInfo');
	}

}
