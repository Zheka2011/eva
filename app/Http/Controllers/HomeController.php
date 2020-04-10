<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exps;
use App\Models\Orders;
use App\Models\Selling;

class HomeController extends Controller {

	public function index() {

		//за месяц

		//Продажи (доходы)
		$incomes = Selling::where('del', '=', 0)->whereMonth('date_of_sell', '=', date('m'))->get();
		$income = $incomes->sum(function ($t) {
			return $t->price - $t->sale;
		});

		//% мастеру общее
		$salary_m = $incomes->sum('salary');

		//расходы на поставку
		$orders = Orders::where('del', '=', 0)->whereMonth('date_of_receiving', '=', date('m'))->get();

		//издержки
		$exes = Exps::where('del', '=', 0)->whereMonth('date_start', '=', date('m'))->sum('cost');
		$exes += $orders->sum(function ($t) {
			return $t->order_cost - $t->cost_of_delivery;
		});
		$exes += $salary_m;

		//прибыль
		$profit = $income - $exes;

		// Зп общая
		$sal = Exps::where('del', '=', 0)->where('id_category_exps', '=', 2)->whereMonth('date_start', '=', date('m'))->sum('cost');
		$salary = $sal + $salary_m;

		return view('dashboard', [
			'income' => $income,
			'exes' => $exes,
			'profit' => $profit,
			'salary' => $salary,
		]);
	}
}
