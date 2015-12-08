<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('illuminato_comments', function(Blueprint $table)
		{
			//
			$table->timestamps();
			$table->dropColumn('date_add');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('illuminato_comments', function(Blueprint $table)
		{
			//
			$table->dateTime('date_add');
			$table->dropTimestamps();
		});
	}

}
