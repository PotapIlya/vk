<?php

namespace App\Components\Images;

use App\Models\Users\User;
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
//		$path = $file->store($userId, $disk);
		$path = Storage::disk($disk)->put($userId, $file);
		$upload = UserGallery::create([
			'user_id' => $userId,
			'img' => $path
		]);
		if ($upload){
			return [
				'id' => $upload->id,
				'img' => $path,
				'user_id' => $userId,
			];
		} else{
			return false;
		}
	}

	protected function deleteFile($file, $disk = 'public')
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
		} else{
			return false;
		}
	}

	protected function deleteAndUpload($file)
	{
		$disk = 'public';
		$userImage = Auth::user()->img;

		if (is_null($userImage)) {
			$update = $this->UPDATE_deleteAndUpload($file);
			if ($update)
			{
				return $update;
			} else{
				return false;
			}
		}
		else
		{
			$delete = Storage::disk($disk)->delete($userImage);
			if ($delete)
			{
				$update = $this->UPDATE_deleteAndUpload($file);
				if ($update) {
					return $update;
				} else{
					return false;
				}
			} else{
				return false;
			}
		}
	}
	private function UPDATE_deleteAndUpload($file, $disk = 'public')
	{
		$userId = Auth::id();

//		$path = $file->store($userId, $disk);
		$path = Storage::disk($disk)->put($userId, $file);
		$update = User::where('id', $userId)->update([
			'img' => $path
		]);
		if ($update){
			return $path;
		} else{
			return false;
		}
	}

}
















