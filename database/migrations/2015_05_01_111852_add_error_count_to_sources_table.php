<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddErrorCountToSourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sources', function(Blueprint $table)
		{
			$table->integer('error_count')->default(0);
			$table->integer('scrape_count')->default(0);
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
			$table->dropColumn('error_count');
			$table->dropColumn('scrape_count');
		});
	}

}
