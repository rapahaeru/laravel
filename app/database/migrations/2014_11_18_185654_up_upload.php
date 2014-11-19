<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpUpload extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('up_upload',function($table){

			$table->increments('up_id'); //autoincrement
			$table->softDeletes();
			$table->timestamps();
			$table->integer('up_status')->limit(1);
			$table->string('up_name')->limit(255);
			$table->string('up_extension')->limit(10);
			$table->string('up_height')->limit(10);
			$table->string('up_width')->limit(10);
			$table->string('up_size')->limit(40);
			$table->string('up_legend')->limit(355);
			$table->string('up_credits')->limit(255);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('up_upload');
	}

}
