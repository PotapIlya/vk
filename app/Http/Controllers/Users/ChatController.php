<?php

namespace App\Http\Controllers\Users;

use App\Events\NewMessage;
use Illuminate\Http\Request;

class ChatController extends BaseUserController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return view('chat.index');
	}

	public function sendMessage(Request $request)
	{

//		return $request->input('message');

		event( new NewMessage($request->input('message')) );
	}

}
