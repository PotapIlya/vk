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

	public function getAllUserImages($userId)
	{
		return $this->startConditions()
			->select(['id', 'user_id', 'img'])
			->where('user_id', $userId)
			->get();
	}

	public function getCountUserImage($userId, $count)
	{
		$images = $this->startConditions()
			->select(['id', 'user_id', 'img'])
			->where('user_id', $userId)
			->take($count)
			->get();

		return $images;
	}

	public function getAllImages()
	{
		$images = $this->startConditions()
			->with('user')
			->orderByDesc('id')
			->get();

		return $images;
	}

	public function getId($id)
	{
		$image =  parent::getId($id);


		if ($image){
			$image = $image->load(['comments', 'user']);
		}

		return $image;


	}


}