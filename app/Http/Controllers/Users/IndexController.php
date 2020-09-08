<?php

namespace App\Http\Controllers\Users;

use App\Components\Images\ActionImages;
use App\Http\Controllers\Users\BaseUserController;
use App\Models\Users\Friends;
use App\Repositories\Users\GalleryRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Auth;

class IndexController extends BaseUserController
{
	const SUCCESS_UPLOAD = 'Фотография добавлена';
	const SUCCESS_DELETE = 'Удалено';
	const ERROR = 'Ой, что то пошло не так';
	const IMG_NO_SELECTED = 'Вы не выбрали изображение';


	private $actionImage;
	private $galleryRepository;
	private $userRepository;

	public function __construct(ActionImages $actionImages,
								GalleryRepository $galleryRepository,
								UserRepository $userRepository
	)
	{
		parent::__construct();

		$this->actionImage = $actionImages;
		$this->galleryRepository = $galleryRepository;
		$this->userRepository = $userRepository;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$user = Auth::user();


    	$images = $this->galleryRepository->getCountUserImage($user->id ,4);


		return view('user.my.index', compact(
			'user',
			'images'
		));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
    	if ($id == Auth::id()) {
			return redirect()->route('user.index.index');
		}


    	$user = $this->userRepository->getId($id);
		$images = $this->galleryRepository->getCountUserImage( $id ,4);


		$friends = Auth::user()->friends();

//		foreach ($friends as $friend)
//		{
//			if ($friend->id == $id)
//			{
//				return true;
//			} else{
//				return false;
//			}
//		}

		// Запрос о дружбе
		$userSubscribe = Auth::user()->hasFriendsRequestReceived($id);
		$userPending = Auth::user()->hasFriendsRequestPending($id);


		$isFriend = Auth::user()->isFriendWith($id);


		return view('user.my.show', compact(
			'user', 'images', 'userSubscribe', 'userPending', 'isFriend'
		));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
    	$user = Auth::user();

    	return view('user.my.edit', compact(
    		'user'
		));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {


    	$image = $request->file('image');
    	if (!is_null($image))
		{
//			dd(12);
			$userAbout = Auth::user()->img;
			$this->actionImage->deleteAndUpload($image, $userAbout);
		}

    	return redirect()->route('user.index.index')->with(['success' => self::SAVE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
