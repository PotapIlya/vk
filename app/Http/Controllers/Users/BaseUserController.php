<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

abstract class BaseUserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
}