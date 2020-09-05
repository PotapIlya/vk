<?php


namespace App\Components\Images;


class ActionImages extends CoreImage
{
	public function uploadImg($file, $userId)
	{
		$upload = parent::uploadFile($file, $userId);
		if ($upload){
			return true;
		} else{
			return false;
		}

	}

	public function deleteImg($imgId, $userId)
	{
		$delete = parent::deleteFile($imgId, $userId);
		if ($delete) {
			return true;
		} else{
			return false;
		}
	}

	public function deleteAndUpload($image, $userAbout, $userId)
	{
		parent::deleteAndUpload($image, $userAbout, $userId);
	}

}


















