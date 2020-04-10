<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('exps', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->float('cost');
			$table->date('date_start');
			$table->date('date_end')->nullable();
			$table->BigInteger('id_category_exps')->unsigned();
			$table->text('comment')->nullable();
			$table->tinyInteger('del')->default(0);
			$table->timestamps();

			$table->foreign('id_category_exps')->references('id')->on('category_exps')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('exps');
	}
}
