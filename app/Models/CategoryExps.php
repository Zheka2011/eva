<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryExps extends Model {

	public function exps() {

		return $this->hasMany('App\Models\Exps', 'id');

	}
}
