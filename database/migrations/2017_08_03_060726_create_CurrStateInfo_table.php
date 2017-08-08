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
			$table->float('ID', 53, 0)->primary('PK_CurrStateInfo');
			$table->string('Name', 50);
			$table->string('Extension', 20);
			$table->string('LoginTime', 30);
			$table->string('LogoutTime', 30);
			$table->boolean('IsLogin');
			$table->boolean('IsReady');
			$table->boolean('OnCall');
			$table->boolean('Idle');
			$table->boolean('ACW');
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
