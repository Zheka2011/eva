<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('sellings', function (Blueprint $table) {
			$table->id();
			$table->string('model');
			$table->string('contact');
			$table->float('price');
			$table->date('date_of_sell');
			$table->BigInteger('user_id')->unsigned();
			$table->float('salary');
			$table->text('comment')->nullable();
			$table->tinyInteger('del')->default(0);
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('sellings');
	}
}
