<?php

namespace App\Http\Livewire\User;


use App\Http\Livewire\CoreLivewire;

use App\Repositories\Users\GalleryRepository;
use Auth;
use Livewire\WithFileUploads;



class GalleryComponent extends CoreLivewire
{
	use WithFileUploads;

	public $photo;
	public $gallery;

	public function render()
	{
		$userId = Auth::id();

		$this->gallery = $this->galleryRepository->getAllUserImages($userId);

		return view('user.gallery.livewire.index');
	}

	public function destroy($id)
	{
		$delete = $this->actionImages->deleteImg($id);
		if ($delete){
			session()->flash('success', self::DELETE);
		} else{
			session()->flash('success', self::ERROR);
		}
	}

	public function test()
	{

		if (!is_null($this->photo))
		{
			$this->validate([
				'photo' => 'image',
			]);

			$upload = $this->actionImages->uploadImg($this->photo);
			if ($upload)
			{
				session()->flash('success', self::SAVE);
			} else{
				session()->flash('success', self::ERROR);
			}
		} else {
			session()->flash('success', self::IMG_NO_SELECTED);
		}

	}


}
