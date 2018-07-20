<?php

use Illuminate\Database\Seeder;

class AsteriskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('AsteriskTableSeeder')->insert([
        	'ProxyIP' => '127.0.0.1',
        	'Post' => 5060,
        	'ManagerUsername' => 'ivoip-admin',
        	'ManagerPassword' => 'Root12',
        	'ManagerPort' => 5038,
        	'Queue' => '100'
        ]);
    }
}
