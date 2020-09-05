<?php

namespace App\Http\Controllers\Users;


use App\Components\Images\ActionImages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Users\GalleryRepository;
use Auth;

class GalleryController extends BaseUserController
{

	private $galleryRepository;
	private $uploadImage;

	public function __construct(
								GalleryRepository $galleryRepository,
								ActionImages $uploadImages
	)
	{
		parent::__construct();

		$this->galleryRepository = $galleryRepository;
		$this->uploadImage = $uploadImages;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$userId = Auth::id();

		$gallery = $this->galleryRepository->getAllImages($userId);


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
		$userId = Auth::id();

		if (!is_null($image))
		{
			$upload = $this->uploadImage->uploadImg($image, $userId);
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
    	$delete = $this->uploadImage->deleteImg($imgId, Auth::id());
    	if ($delete){
    		return redirect()->back()->with(['success' => self::SUCCESS_DELETE]);
		} else{
			return redirect()->back()->withErrors(['msg' => self::ERROR]);
		}

    }
}
