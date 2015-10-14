<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultistoreToCommentsTable extends Migration {

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
			$table->integer('id_shop')->after('id_illuminato_comments');
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
			$table->dropColumn('id_shop');
		});
	}

}
