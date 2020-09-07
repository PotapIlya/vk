<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repositories\Users\GalleryRepository;
use App\Components\Images\ActionImages;



abstract class CoreLivewire extends Component
{
	const UPLOAD = 'Фотография добавлена';
	const DELETE = 'Удалено';
	const ERROR = 'Ой, что то пошло не так';
	const IMG_NO_SELECTED = 'Вы не выбрали изображение';
	const SAVE = 'Сохранено!';


	protected $galleryRepository;
	protected $actionImages;


	public function __construct($id)
	{
		parent::__construct($id);


		$this->updateFile( new GalleryRepository, new ActionImages );
	}

	private function updateFile( $galleryRepository, $actionImages)
	{
		$this->galleryRepository = $galleryRepository;
		$this->actionImages = $actionImages;
	}


}