<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelMaterialsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('sel_materials', function (Blueprint $table) {
			$table->id();
			$table->BigInteger('id_selling')->unsigned();
			$table->BigInteger('id_material')->unsigned();
			$table->float('quantum');
			$table->float('cost_quantum');
			$table->tinyInteger('del')->default(0);
			$table->timestamps();

			$table->foreign('id_selling')->references('id')->on('sellings')->onDelete('cascade');
			$table->foreign('id_material')->references('id')->on('materials')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('sel_materials');
	}
}
