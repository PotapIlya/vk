<?php


namespace App\Repositories\Users;


use App\Models\Users\Comments as Model;
use App\Repositories\CoreRepository;

class CommentRepository extends CoreRepository
{
	protected function getModelClass()
	{
		return Model::class;
	}

//	public function getCommentId($id)
//	{
//		return $this->startConditions()
//			->where('gallery_id', $id)
//			->with('user')
//			->get();
//	}

}