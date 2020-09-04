<?php


namespace App\Components;

use App\Models\Users\User;
use App\Models\Users\UserAbout;
use Auth;
use Illuminate\Support\Facades\Storage;

final class ImageUploads
{


	public function upload($file)
	{
		$userImg = Auth::user()->about->img;

		if (is_null($userImg))
		{
			$this->uploadFile($file);
		} else{
			$this->deleteFile($userImg, $file);
		}

	}
	private function uploadFile($file)
	{

		$path = $file->store(Auth::id(), 'public');

		$upload = Auth::user()->about->update([
			'img' => $path
		]);
//		return true;
	}
	public function deleteFile($userImg, $file) : bool
	{
		$delete = Storage::disk('public')->delete($userImg);
		if ($delete){
			$this->uploadFile($file);
			return true;
		} else {
			return false;
		}
	}
}