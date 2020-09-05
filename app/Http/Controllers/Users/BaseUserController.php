<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

abstract class BaseUserController extends Controller
{

	const SUCCESS_UPLOAD = 'Фотография добавлена';
	const SUCCESS_DELETE = 'Удалено';
	const ERROR = 'Ой, что то пошло не так';
	const IMG_NO_SELECTED = 'Вы не выбрали изображение';
	const SAVE = 'Сохранено!';

	public function __construct()
	{
		$this->middleware('auth');
	}
}