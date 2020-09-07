<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $table = 'comments';
	protected $guarded = ['id'];



	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
