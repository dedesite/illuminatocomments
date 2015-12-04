<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserInfoToCommentsTable extends Migration {

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
			$table->string('firstname', 255)->after('id_product');
			$table->string('lastname', 255)->after('firstname');
			$table->string('email', 255)->after('lastname');
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
			$table->dropColumn(['firstname', 'lastname', 'email']);
		});
	}

}
