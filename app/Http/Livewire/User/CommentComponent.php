<?php

namespace App\Http\Livewire\User;

use App\Http\Livewire\CoreLivewire;
use App\Models\Users\UserGallery;
use Livewire\Component;
use App\Models\Users\Comments;
use Auth;

class CommentComponent extends CoreLivewire
{
	public $input;
	public $gallery_id;
	public $comments;


	public function mount($id)
	{
		$this->gallery_id = $id;
	}

    public function render()
    {
		$this->comments = UserGallery::where('id', $this->gallery_id)
			->with(['comments', 'user'])
			->first();

//		dd($this->comments);
//    	$this->comments = $this->galleryRepository->getId($this->gallery_id);


        return view('user.gallery.livewire.comment');
    }


    public function save()
	{


		$validatedData = $this->validate([
			'input' => 'required',
		]);


		Comments::create([
			'user_id' => Auth::id(),
			'gallery_id' => $this->gallery_id,
			'text' => $this->input,
		]);

		$this->resizeInput();

//		session()->flash('success', self::SAVE);
	}

	private function resizeInput()
	{
		$this->input = null;
	}

}
