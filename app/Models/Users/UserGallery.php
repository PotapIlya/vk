<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserGallery extends Model
{
    protected $table = 'user_galleries';
    protected $guarded = ['id'];








    public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	public function comments()
	{
		return $this->hasMany(Comments::class, 'gallery_id', 'id');
	}

	public function like()
	{
		return $this->hasMany(Like::class, 'gallery_id', 'id');
	}



}
