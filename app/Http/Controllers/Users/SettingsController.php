<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\BaseUserController;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends BaseUserController
{

	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		parent::__construct();

		$this->userRepository = $userRepository;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$user = Auth::user();


    	return view('user.settings.index', compact(
    		'user'
		));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
    	$user = $this->userRepository->getId($id);

		$validation = \Validator::make($request->all() ,[
			'old_password' => 'string|min:8',
			'password' => 'string|min:8|confirmed',
		]);
		if ($validation->fails())
		{
			dd($validation->errors());
			return redirect()->back()->withErrors(['msg' => $validation->errors() ]);
		}

		if(Hash::check($request->old_password, $user->password))
		{
			$update = $user->update([
				'password' => bcrypt($request->password)
			]);
			if ($update)
			{
				return redirect()->back()->with(['success' => self::SAVE]);
			}else{
				return redirect()->back()->withErrors(['msg' => self::ERROR]);
			}
		}else{
			return redirect()->back()->withErrors(['msg' => self::ERROR]);
		}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
