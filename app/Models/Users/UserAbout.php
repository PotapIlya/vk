<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserAbout extends Model
{
    protected $table = 'user_abouts';
    protected $guarded = ['id'];


//    public function user()
//	{
//		return $this->belongsTo(User::class, 'id', 'user_id');
//	}

}
