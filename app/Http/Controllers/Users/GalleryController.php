<?php

namespace App\Http\Controllers\Users;


use App\Components\Images\ActionImages;
use App\Http\Controllers\Controller;
use App\Models\Users\Comments;
use App\Models\Users\User;
use App\Repositories\Users\CommentRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use App\Repositories\Users\GalleryRepository;
use Auth;

class GalleryController extends BaseUserController
{

	private $galleryRepository;
	private $uploadImage;
	private $userRepository;
	private $commentRepository;

	public function __construct(


								GalleryRepository $galleryRepository,
								ActionImages $uploadImages,
								UserRepository $userRepository,
								CommentRepository $commentRepository
	)
	{
//		parent::__construct();

		$this->galleryRepository = $galleryRepository;
		$this->uploadImage = $uploadImages;
		$this->userRepository = $userRepository;
		$this->commentRepository = $commentRepository;
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

    }

    public function storeImage(Request $request)
	{
		$image = $request->image;

		if (!is_null($image))
		{
			$upload = $this->uploadImage->uploadImg($image);
			if (!$upload){
				return redirect()->back()->withErrors(['msg' => self::ERROR]);
			}

			return response()->json(['success' => $upload]);
		}
		else{
			return redirect()->back()->withErrors(['msg' => self::IMG_NO_SELECTED]);
		}


	}


    public function storeComment(Request $request)
	{
		if (!is_null($request->id) && !is_null($request->text))
		{
			$userId = Auth::id();

			$upload = Comments::create([
				'user_id' => $userId,
				'gallery_id' => $request->id,
				'text' => $request->text,
			]);

			if($upload)
			{
				$user = $this->userRepository->getId($userId);
				return [
					'text' => $request->text,
					'user' => $user,
				];
			}
			else{
				return self::ERROR;
			}
		} else{
			return self::ERROR.' нет id или text';
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
			return abort(404);
//			return redirect()->back()->withErrors(['msg' => self::ERROR]);
		}

		$comments = $this->commentRepository->getCommentId($id);

		return view('user.gallery.show', compact(
			'image', 'comments'
		));

    }


    public function showGalleryPerson($id)
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
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($id)
    {

    }
    public function destroyImage(Request $request)
	{
		$delete = $this->uploadImage->deleteImg($request->id);
		if ($delete)
		{
			return response()->json(['success' => $request->id]);
		} else{
			return response()->json(['error' => self::ERROR]);
		}
	}
}
