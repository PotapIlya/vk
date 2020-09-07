<?php


namespace App\Repositories\Users;


use App\Repositories\CoreRepository;
use App\Models\Users\User as Model;

class UserRepository extends CoreRepository
{

	protected function getModelClass()
	{
		return Model::class;
	}


//	public function getId($id)
//	{
//		return parent::getId($id);
//
//	}


}