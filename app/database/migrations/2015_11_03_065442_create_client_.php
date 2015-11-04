<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClient extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('type', function($table){
			$table->increments('id');
			$table->string('type');
		});

		Schema::create('status', function($table){
			$table->increments('id');
			$table->string('status');
		});

		Schema::create('client', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('Name');
			$table->integer('status')->unsigned();;
			$table->foreign('status')->references('id')->on('status');
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('type');
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
		Schema::dropIfExists("status");
		Schema::dropIfExists("type");
		Schema::dropIfExists("client");
	}

}
