<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /** FUNCTIONS */


	public function gallery()
	{
		return $this->hasMany(UserGallery::class, 'user_id', 'id');
	}

	public function comments()
	{
		return $this->hasMany(Comments::class, 'user_id', 'id');
	}


	public function friendsOfMine()
	{
		return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
	}
	public function friendsOf()
	{
		return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
	}


	public function friends()
	{
		return $this->friendsOfMine()->wherePivot('accepted', true)->get()
			->merge( $this->friendsOf()->wherePivot('accepted', true)->get() );
	}



	// Запрос в друзья
	public function friendRequest()
	{
		return $this->friendsOfMine()->wherePivot('accepted', false)->get();
	}

	// Запрос на ожидание друга
	public function friendRequestPending()
	{
		return $this->friendsOf()->wherePivot('accepted', false)->get();
	}

	// Запрос на добавления в друзья
	public function hasFriendsRequestPending($id)
	{
		return $this->friendRequestPending()->where('id', $id)->count();
	}

	// Запрос о дружбе
	public function hasFriendsRequestReceived($id)
	{
		return $this->friendRequest()->where('id', $id)->count();
	}

	// уже в друзьях
	public function isFriendWith($id)
	{
		return $this->friends()->where('id', $id)->count();
	}







	// принять запрос дружбы
//	public function addFriend($id)
//	{
//		return $this->friendRequestPending()->first()->pivot();
//	}



	// Добавить друга
	public function addFriend($id)
	{
		return $this->friendsOf()->attach($id);
	}
//
//	// Принять запрос на дружбу
//	public function acceptFriendRequest($id)
//	{
//		return $this->friendRequest()->where('id', $id)->first()->pivot()->update([
//			'accepted' => true
//		]);
//	}



}
