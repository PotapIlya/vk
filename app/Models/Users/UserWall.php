<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserWall extends Model
{
	protected $table = 'user_walls';
	protected $guarded = ['id'];
}
