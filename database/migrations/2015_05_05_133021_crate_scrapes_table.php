<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateScrapesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scrapes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('status',array('pending', 'success', 'fail'));
			$table->integer('source_id');
			$table->integer('run_id');
			$table->unique(array('source_id', 'run_id'));
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scrapes');
	}

}
