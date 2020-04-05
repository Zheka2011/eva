<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitCostColumnMaterialsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('materials', function (Blueprint $table) {
			$table->float('unit_cost')->after('unit');
			$table->float('sale_unit_cost')->after('unit_cost');
			$table->BigInteger('order_id')->unsigned()->nullable()->after('sale_unit_cost');

			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('materials', function (Blueprint $table) {
			$table->dropColumn('unit_cost');
			$table->dropColumn('sale_unit_cost');
			$table->dropColumn('order_id');

			$table->dropForeign('order_id');
		});
	}
}
