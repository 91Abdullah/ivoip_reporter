<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInAsteriskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('AsteriskTable', function (Blueprint $table) {
            $table->string('ManagerUsername')->default("asterisk");
            $table->string('ManagerPassword')->default("asterisk");
            $table->integer('ManagerPort')->default(5038);
            $table->string('Queue')->default("100");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('AsteriskTable', function (Blueprint $table) {
            //
        });
    }
}
