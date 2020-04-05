<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelMaterials extends Model {

	public function selMats() {
		return $this->hasMany('App\Models\Selling', 'id_selling');
	}

	public function selMaterial() {
		return $this->belongsTo('App\Models\Materials', 'id');
	}

}
