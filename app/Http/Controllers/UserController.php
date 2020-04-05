<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
	public function index() {

		$users = DB::select('
			SELECT u.id, u.name, u.email, r.name as role FROM `users` as `u`
				LEFT JOIN `users_roles` as `ur` ON `u`.`id` = `ur`.`user_id`
				LEFT JOIN `roles` as `r` ON `ur`.`role_id` = `r`.`id`
			');

		return view('users', ['users' => $users]);
	}
}
