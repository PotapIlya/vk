<?php

namespace App\Repositories;

abstract class CoreRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = app($this->getModelClass());
	}

	abstract protected function getModelClass();

	public function startConditions()
	{
		return clone $this->model;
	}
	public function getId($id)
	{
		return $this->startConditions()->find($id);
	}

}