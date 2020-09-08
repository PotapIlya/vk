<?php

namespace App\Http\Controllers\Users;


use App\Components\Images\ActionImages;
use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use App\Repositories\Users\GalleryRepository;
use Auth;

class GalleryController extends BaseUserController
{

	private $galleryRepository;
	private $uploadImage;
	private $userRepository;

	public function __construct(
								GalleryRepository $galleryRepository,
								ActionImages $uploadImages,
								UserRepository $userRepository
	)
	{
		parent::__construct();

		$this->galleryRepository = $galleryRepository;
		$this->uploadImage = $uploadImages;
		$this->userRepository = $userRepository;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

		$userId = Auth::id();

		$gallery = $this->galleryRepository->getAllUserImages($userId);

//		dd($images);

    	return view('user.gallery.index', compact(
    		'gallery'
		));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

    	$image = $request->file('image');

		if (!is_null($image))
		{
			$upload = $this->uploadImage->uploadImg($image);
			if (!$upload){
				return redirect()->back()->withErrors(['msg' => self::ERROR]);
			}

			return redirect()->route('user.gallery.index')->with(['success' => self::SUCCESS_UPLOAD]);
		}
		else{
			return redirect()->back()->withErrors(['msg' => self::IMG_NO_SELECTED]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
    	$image = $this->galleryRepository->getId($id);
		if (!$image){
			return redirect()->back()->withErrors(['msg' => self::ERROR]);
		}


		return view('user.gallery.show', compact(
			'image'
		));

    }


    public function showGalleryPersone($id)
	{


		$userImages = $this->galleryRepository->getAllUserImages( $id );


//		dd($userImages);

		return view('user.gallery.persone', compact(
			'userImages'
		));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $imgId
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($imgId)
    {
    	$delete = $this->uploadImage->deleteImg($imgId);
    	if ($delete)
		{
			return redirect()->back()->with(['success' => self::SUCCESS_DELETE]);
		} else{
			return redirect()->back()->withErrors(['error' => self::ERROR]);
		}
    }
}
