<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){

			$table->increments('usr_id'); //autoincrement
			$table->softDeletes();
			$table->timestamps();
			$table->integer('usr_status')->limit(1);
			$table->integer('usr_level')->limit(1);
			$table->string('usr_name')->limit(255);
			$table->string('usr_mail')->limit(155);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		//$table->dropColumn('');
	}

}
