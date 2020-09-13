<?php


namespace App\Components\Images;


class ActionImages extends CoreImage
{
	public function uploadImg($file)
	{
		$upload = parent::uploadFile($file);
		if ($upload){
			return $upload;
		} else{
			return false;
		}

	}

	public function deleteImg($imgId)
	{

		$delete = parent::deleteFile($imgId);
		if ($delete) {
			return $delete;
		} else{
			return false;
		}
	}

	public function deleteAndUpload($image)
	{
		return parent::deleteAndUpload($image);
	}

}


















