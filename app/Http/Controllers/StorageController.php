<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materials;
use App\Models\Orders;
use Illuminate\Http\Request;

class StorageController extends Controller {
	public function index() {

		$orders = Orders::select('id', 'provisioner', 'date_of_receiving', 'cost_of_delivery')->orderby('id', 'desc')->get();

		StorageController::saveTV_CP();

		$materials = Materials::where('del', '=', 0)->orderby('id', 'desc')->paginate(10);

		return view('storage',
			['materials' => $materials,
				'orders' => $orders]
		);
	}

	public function mat_add(Request $req) {
		$valid = $req->validate([
			'name' => 'required',
			'color' => 'required',
			'amt' => 'required',
			'unit' => 'required',
			'unit_cost' => 'required',
			'volume' => 'required',
		]);

		$t_material = new Materials();
		$t_material->name = $req->input('name');
		$t_material->color = $req->input('color');
		$t_material->amt = $req->input('amt');
		$t_material->unit = $req->input('unit');
		$t_material->volume = $req->input('volume');
		$t_material->total_volume = $req->input('volume') * $req->input('amt');
		$t_material->unit_cost = $req->input('unit_cost');
		$t_material->sale_unit_cost = 0;
		$t_material->order_id = $req->input('order_id');

		$t_material->save();

		return redirect()->route('materials')->with('success', 'Новый материал добавлен');

	}

	public function mat_del(Request $req) {
		Materials::find($req->input('id_del'))->delete();

		return redirect()->route('storage')->with('success', 'Материал удален');
	}
	//пересчитать и записать в базу materials.total_volume & materials.cost_price
	public static function saveTV_CP() {
		$materials = Materials::where('del', '=', 0)->orderby('id', 'desc')->get();

		foreach ($materials as $id => $material) {

			$quantum = $material->sellingOnMaterials->sum('quantum');
			$materials[$id]->total_volume = $materials[$id]->volume * $materials[$id]->amt - $quantum;

			if ($material->orderOnMaterials->order_cost != 0) {
				$p_on_mat_orders = (100 * ($material->unit_cost * $material->amt) / $material->orderOnMaterials->order_cost);

				$p_on_one_mat_orders = (($p_on_mat_orders * $material->orderOnMaterials->cost_of_delivery) / 100) / $material->amt;

				$cost_price = ceil($p_on_one_mat_orders + $material->unit_cost);

				if ($materials[$id]->cost_price !== $cost_price) {

					$materials[$id]->cost_price = $cost_price;

				}
			} else {
				$materials[$id]->cost_price = $material->unit_cost;
			}

			$materials[$id]->save();
		}

	}
}
