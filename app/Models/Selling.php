<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Selling extends Model {
	protected $casts = [
		'date_of_sell' => 'date',
	];

	public function userSel() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function selMat() {
		return $this->hasManyThrough('App\Models\Materials', 'App\Models\SelMaterials', 'id_selling', 'id', 'id', 'id_material');
	}

	public function selMQ() {
		return $this->hasMany('App\Models\SelMaterials', 'id_selling');
	}
}
