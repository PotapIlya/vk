<?php

namespace App\Components\Images;

use App\Models\Users\UserAbout;
use App\Models\Users\UserGallery;
use Storage;
use Auth;

abstract class CoreImage
{
//	public function __construct()
//	{
//
//	}

	protected function uploadFile($file, $disk = 'public')
	{
		$userId = Auth::id();
		$path = $file->store($userId, $disk);
		$upload = UserGallery::create([
			'user_id' => $userId,
			'img' => $path
		]);
		if ($upload){
			return true;
		} else{
			return false;
		}
	}

	protected function deleteFile($file,$disk = 'public')
	{
		$img = UserGallery::find($file);

		$userId = Auth::id();

		if ($img && $img->user_id === $userId){
			$img->delete();
			$delete = Storage::disk($disk)->delete($img->img);

			if ($delete){
				return true;
			} else{
				return false;
			}
		}
	}

	protected function deleteAndUpload($file, $userImage)
	{
		$disk = 'public';

		if (is_null($userImage)) {
			$this->UPDATE_deleteAndUpload($file);
		}
		else {
			$delete = Storage::disk($disk)->delete($userImage);
			if ($delete)
			{
				$this->UPDATE_deleteAndUpload($file);
			} else{
				return false;
			}
		}
	}
	private function UPDATE_deleteAndUpload($file, $disk = 'public')
	{
		$userId = Auth::id();

		$path = $file->store($userId, $disk);
		$update = UserAbout::where('user_id', $userId)->update([
			'img' => $path
		]);
		if ($update){
			return true;
		} else{
			return false;
		}
	}

}
















