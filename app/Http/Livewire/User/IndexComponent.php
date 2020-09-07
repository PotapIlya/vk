<?php

namespace App\Http\Livewire\User;

use App\Http\Livewire\CoreLivewire;
use App\Models\Users\User;
use App\Models\Users\UserAbout;
use Auth;

class IndexComponent extends CoreLivewire
{

	public $user, $login, $first_name, $last_name, $gender;


	protected $rules = [
		'first_name' => 'required',
		'last_name' => 'required',
		'gender' => 'required',
		'login' => 'required',
	];

    public function render()
    {
    	$user = Auth::user();

    	$this->user = $user;

    	$this->login = $user->login;
    	$this->first_name = $user->first_name;
    	$this->last_name = $user->last_name;
    	$this->gender = $user->gender;

        return view('user.my.livewire.app');
    }

    public function save($d)
	{
		$userId = Auth::id();

		$validatedData = $this->validate($this->rules);


//		$update = User::where('id', $userId)->update([
//			'login' => $this->login,
//			'first_name' => $this->first_name,
//			'last_name' => $this->last_name,
//			'gender' => $this->gender ,
//		]);
		$update = User::where('id', $userId)->update($validatedData);
		if ($update)
		{
			session()->flash('success', self::SAVE);
		} else{
			session()->flash('success', self::ERROR);
		}
	}
}
