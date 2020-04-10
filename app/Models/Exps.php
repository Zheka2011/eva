<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exps extends Model {

	public function categoryExps() {

		return $this->belongsTo('App\Models\CategoryExps', 'id_category_exps');

	}
}
