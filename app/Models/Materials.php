<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model {

	public function orderOnMaterials() {
		return $this->belongsTo('App\Models\Orders', 'order_id');
	}

	public function sellingOnMaterials() {
		return $this->hasMany('App\Models\SelMaterials', 'id_material');
	}
}
