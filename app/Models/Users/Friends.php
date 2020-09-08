<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
	protected $table = 'friends';
	protected $guarded = ['id'];
}
