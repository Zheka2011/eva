<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

	protected $casts = [
		'date_of_receiving' => 'date',
	];

	public function materialsOnOrder() {
		return $this->hasMany('App\Models\Materials', 'order_id');
	}

}
