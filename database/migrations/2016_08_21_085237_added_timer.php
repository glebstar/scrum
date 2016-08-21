<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedTimer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cards', function (Blueprint $table) {
			$table->integer('start_timer')->default(1471773019);
			$table->integer('pause_timer')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cards', function (Blueprint $table) {
			$table->dropColumn(['start_timer', 'pause_timer']);
		});
	}
}
