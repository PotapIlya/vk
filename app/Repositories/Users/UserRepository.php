<?php


namespace App\Repositories\Users;


use App\Repositories\CoreRepository;
use App\Models\Users\User as Model;
use Auth;

class UserRepository extends CoreRepository
{

	protected function getModelClass()
	{
		return Model::class;
	}


//	public function getUserFriends()
//	{
////		$id = Auth::id();
////		$user = parent::getId($id);
//
////		$user->friends = $user->friends();
////		if ($user) $user = $user->load('friends');
////		dd($user->friends());
//
//		return Auth::user()->friends();
//
//	}

//	public function getUserFriendsRequest()
//	{
//		$user =  Auth::user()->friendRequestPending();
//
////		dd($user);
//		return $user;
//	}

	public function getAllUser()
	{
		return $this->startConditions()
			->where('id', '!=', Auth::id())
			->get();
	}

}