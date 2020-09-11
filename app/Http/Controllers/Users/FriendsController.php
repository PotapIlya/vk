<?php

namespace App\Http\Controllers\Users;


use App\Models\Users\Friends;
use App\Models\Users\User;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;

class FriendsController extends BaseUserController
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


    	$friends = $this->userRepository->getUserFriends();
    	$friendsRequest = $this->userRepository->getUserFriendsRequest();

    	$subscriber = \Auth::user()->friendRequest();

//    	dd($subscriber->friendRequest());

//    	dd($friendsRequest);
//		dd(12);


    	return view('user.friends.index', compact(
    		'friends', 'friendsRequest', 'subscriber'
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
    public function update(Request $request, $friendId)
    {
    	$user = $this->userRepository->getId($friendId);

    	if ( $user->hasFriendsRequestPending(\Auth::id()) || \Auth::user()->hasFriendsRequestPending($friendId) )
		{
//			\Auth::user()->addFriend($friendId);

//			dd( \Auth::user()->addFriend($friendId) );

//			$frend = Friends::where('user_id', 2)->get();

//			\Auth::user()->addFriend($friendId);


//			dd( \Auth::user()->addFriend($friendId) );


//			dd($frend);

			return redirect()->back()->with(['success' => 'da']);
		}
    	else{
    		return redirect()->back()->withErrors(['msg' => self::ERROR]);
		}
    }
    public function addFriend($id)
	{

		dd( $id );

		\Auth::user()->addFriend($id);
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
