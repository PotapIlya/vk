<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends BaseGuestController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return view('guest.index');
	}
}
