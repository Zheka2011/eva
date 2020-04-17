<?php

namespace App\Http\Controllers;

use App\Models\CategoryExps;
use App\Models\Exps;
use Illuminate\Http\Request;

class ExpsController extends Controller {

	public function index() {

		$exps = Exps::paginate(20);

		$categorys = CategoryExps::all();

		return view('exps', [
			'exps' => $exps,
			'categorys' => $categorys,
		]);
	}

	public function addExps(Request $req) {

		$valid = $req->validate([
			'contractor' => 'required',
			'cost' => 'required',
			'date_start' => 'required',
			'id_category_exps' => 'required',
		]);

		$exps = new Exps();
		$exps->contractor = $req->input('contractor');
		$exps->cost = $req->input('cost');
		$exps->date_start = $req->input('date_start');
		$exps->date_end = $req->input('date_end');
		$exps->id_category_exps = $req->input('id_category_exps');
		$exps->comment = $req->input('comment');
		$exps->save();

		return redirect()->route('exps')->with('success', 'Успех');

	}
}
