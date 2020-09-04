<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseGuestController extends Controller
{
    public function __construct()
	{
		$this->middleware('guest');
	}
}
