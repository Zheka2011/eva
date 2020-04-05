<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVolumeColumnsMaterialsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('materials', function (Blueprint $table) {
			$table->float('volume')->after('amt');
			$table->float('cost_price')->after('unit')->nullable();
			$table->float('total_volume')->after('volume');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('materials', function (Blueprint $table) {
			$table->dropColumn('volume');
			$table->dropColumn('cost_price');
			$table->dropColumn('total_volume');
		});
	}
}
