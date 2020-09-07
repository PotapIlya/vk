<?php

namespace App\Repositories\Users;

use App\Models\Users\UserGallery as Model;
use App\Repositories\CoreRepository;
use Auth;

class GalleryRepository extends CoreRepository
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getModelClass()
	{
		return Model::class;
	}

	public function getAllUserImages()
	{
		$userId = Auth::id();

		return $this->startConditions()
			->select(['id', 'user_id', 'img'])
			->where('user_id', $userId)
			->get();
	}

	public function getCountImage($count)
	{
		$userId = Auth::id();

		return $this->startConditions()
			->select(['id', 'user_id', 'img'])
			->where('user_id', $userId)
			->take($count)
			->get();
	}

}