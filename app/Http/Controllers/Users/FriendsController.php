<?php

namespace App\Http\Controllers\Users;


use App\Models\Users\Friends;
use App\Models\Users\User;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Auth;

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
		$user = Auth::user();

		$friends = $user->friends();
		$friendsRequest = $user->friendRequestPending();

    	return view('user.friends.index', compact(
    		'friends', 'friendsRequest'
		));
    }

	public function requests()
	{
		$user = Auth::user();

		$friendsRequest = $user->friendRequestPending();


		return view('user.friends.requests', compact(
			'friendsRequest'
		));
	}


    public function subscribe()
	{
		$user = Auth::user();

		$friendsRequest = $user->friendRequestPending();
		$subscriber = Auth::user()->friendRequest();


		return view('user.friends.subscribe', compact(
			'friendsRequest', 'subscriber'
		));
	}

	public function search()
	{
		$user = Auth::user();
		$friendsRequest = $user->friendRequestPending();

		$allUser = $this->userRepository->getAllUser();

		return view('user.friends.search', compact(
			'friendsRequest',
			'allUser'
		));
	}


	public function postAddFriend(Request $request)
	{
		$id = $request->data;
		$user = $this->userRepository->getId($id);
		if (!$user) {
			return response()->json(['error' => self::ERROR]);
		}

		if ( Auth::user()->hasFriendsRequestPending($user->id)
			|| $user->hasFriendsRequestPending(Auth::id()) )
		{
			return response()->json(['error' => 'Пользователю отправлен запрос в друзья']);
		}
		if ( Auth::user()->isFriendWith($id) )
		{
			return response()->json(['error' => 'Пользователь уже в друзьях']);
		}

		$add = Auth::user()->addFriend($user->id);
		return response()->json(['success' => 123]);

//		if ($add)
//		{
//			return response()->json(['success' => 123]);
//		} else{
//			return response()->json(['error' => self::ERROR]);
//		}

	}
	public function postAccept(Request $request)
	{
		$id = $request->data;
		$user = $this->userRepository->getId($id);
		if (!$user) {
			return response()->json(['error' => self::ERROR]);
		}

		Auth::user()->acceptFriendRequest($id);
		return response()->json(['success' => 123]);
	}

	public function postDelete(Request $request)
	{
		$id = $request->data;
		$user = $this->userRepository->getId($id);
		if (!$user) {
			return redirect()->back()->withErrors(['msg' => self::ERROR]);
		}
		if ($request->type === 'subscribe')
		{
			Auth::user()->deleteFriend($id);
		}

		Auth::user()->deleteFriend($id);

		return response()->json(['success' => 123]);
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
    	//
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
