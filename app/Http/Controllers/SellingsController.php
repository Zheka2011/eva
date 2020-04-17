<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materials;
use App\Models\Selling;
use App\Models\SelMaterials;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellingsController extends Controller {

	public function index() {

		StorageController::saveTV_CP();

		$sellings = Selling::where('del', '=', 0)->orderby('date_of_sell', 'desc')->paginate(20);

		foreach ($sellings as $id => $selling) {

			$sellings[$id]->sum_ss = (Selling::find($selling->id)->selMQ->sum('cost_quantum')) + $selling->salary;

		}

		$users = User::all();

		foreach ($users as $id => $user) {
			$active = false;
			if ($user->id == Auth::id()) {
				$active = true;
			}
			$users[$id]->active = $active;
		}

		return view('sellings', [
			'sellings' => $sellings,
			'users' => $users,
		]);
	}

	public function selMQ($id) {

		$selMQ = Selling::find($id);

		$materials = Materials::where('total_volume', '>', 0)->get();

		static::saveCostQuantum($selMQ);

		return view('selMQ', [
			'selMQ' => $selMQ,
			'materials' => $materials,
		]);
	}

	public function selAdd(Request $req) {

		$valid = $req->validate([
			'model' => 'required',
			'contact' => 'required',
			'price' => 'required',
			'date_of_sell' => 'required',
			'user_id' => 'required',
			'salary' => 'required',
		]);

		$selling = new Selling();
		$selling->model = $req->input('model');
		$selling->contact = $req->input('contact');
		$selling->price = $req->input('price');
		$selling->sale = $req->input('sale');
		$selling->date_of_sell = $req->input('date_of_sell');
		$selling->user_id = $req->input('user_id');
		$selling->salary = $req->input('salary');
		$selling->comment = $req->input('comment');

		$selling->save();

		return redirect()->route('sellings')->with('success', 'Новая продажа добавлена');
	}

	public function selAddMQ($id, Request $req) {

		$valid = $req->validate([
			'id_material' => 'required',
			'quantum' => 'required',
		]);

		$selMQ = new SelMaterials();
		$selMQ->id_selling = $id;
		$selMQ->id_material = $req->input('id_material');
		$selMQ->quantum = $req->input('quantum');
		$selMQ->cost_quantum = 0;
		$selMQ->save();

		return redirect()->route('selMQ', ['id' => $id])->with('success', 'Материал добавлен в продажу');
	}

	//$selMQ = Selling::find($id);
	public static function saveCostQuantum($selMQ) {
		foreach ($selMQ->selMat as $id => $sel) {
			$selMQ->selMQ[$id]->cost_quantum = $sel->cost_price * (($selMQ->selMQ[$id]->quantum / $sel->volume) * 100) / 100;
			$selMQ->selMQ[$id]->save();
		}
	}
}
