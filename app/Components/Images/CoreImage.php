<?php

namespace App\Components\Images;

use App\Models\Users\UserAbout;
use App\Models\Users\UserGallery;
use Storage;

abstract class CoreImage
{
//	public function __construct()
//	{
//
//	}

	protected function uploadFile($file, $userId, $disk = 'public')
	{
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

	protected function deleteFile($file, $userId, $disk = 'public')
	{
		$img = UserGallery::find($file);

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

	protected function deleteAndUpload($file, $userImage, $userId)
	{
		$disk = 'public';
		if (is_null($userImage))
		{
			$path = $file->store($userId, $disk);
			$upload = UserAbout::where('user_id', $userId)->update(['img' => $path]);

			if ($upload){
				return true;
			} else{
				return false;
			}
		}
		else
		{
			$delete = Storage::disk($disk)->delete($userImage);
			if ($delete)
			{
				$path = $file->store($userId, $disk);
				$upload = UserAbout::where('user_id', $userId)->update(['img' => $path]);
				if ($upload){
					return true;
				} else{
					return false;
				}
			} else{
				return false;
			}

		}
	}

}
















