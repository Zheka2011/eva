<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller {

	public function index() {

		$orders = Orders::paginate(10);

		foreach ($orders as $id => $order) {
			$order_cost = 0;
			$order_cost = Orders::find($order->id)->materialsOnOrder->sum(function ($t) {
				return $t->amt * $t->unit_cost;
			});

			if ($orders[$id]->order_cost !== $order_cost) {
				$orders[$id]->order_cost = $order_cost;
				$orders[$id]->save();
			}

		}

		return view('orders', ['orders' => $orders]);
	}

	public function ord_add(Request $req) {

		$valid = $req->validate([
			'provisioner' => 'required',
			'date_of_receiving' => 'required',
			'shipper' => 'required',
			'cost_of_delivery' => 'required',
		]);

		$order = new Orders();
		$order->provisioner = $req->input('provisioner');
		$order->date_of_receiving = $req->input('date_of_receiving');
		$order->shipper = $req->input('shipper');
		$order->cost_of_delivery = $req->input('cost_of_delivery');
		$order->comment = $req->input('comment');

		$order->save();

		return redirect()->route('orders')->with('success', 'Новая поставка добавлена');
	}
}
