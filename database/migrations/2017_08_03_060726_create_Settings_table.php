<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Settings', function(Blueprint $table)
		{
			$table->integer('ID');
			$table->string('name', 50);
			$table->string('extension', 20);
			$table->integer('Port');
			$table->boolean('AAFlag');
			$table->boolean('CFBFlag');
			$table->string('CFBNumber', 15);
			$table->boolean('CFNRFlag');
			$table->string('CFNRNumber', 15);
			$table->boolean('CFUFlag');
			$table->string('CFUNumber', 15);
			$table->boolean('DNDFlag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Settings');
	}

}
