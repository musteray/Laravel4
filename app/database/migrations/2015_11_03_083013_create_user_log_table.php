<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_log', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->timestamp('login');
			$table->timestamp('logout');
			$table->string('purpose');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('user_log');
	}

}
