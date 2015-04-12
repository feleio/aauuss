<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScraperIdToSources extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sources', function(Blueprint $table)
		{
			$table->integer('scraper_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sources', function(Blueprint $table)
		{
			$table->dropColumn('scraper_id');
		});
	}

}
