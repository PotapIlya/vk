<?php

namespace App\Http\Controllers\Users;

use App\Components\Images\ActionImages;
use App\Http\Controllers\Users\BaseUserController;
use App\Repositories\Users\GalleryRepository;
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

	public function __construct(ActionImages $actionImages,
								GalleryRepository $galleryRepository
	)
	{
		parent::__construct();

		$this->actionImage = $actionImages;
		$this->galleryRepository = $galleryRepository;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$user = Auth::user();


    	$images = $this->galleryRepository->getCountImage(4);

    	if ($user) $user = $user->load('about');


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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    	// add rules for request

		$update = Auth::user()->update($request->all());
		if (!$update) {
			return redirect()->route('user.index.index')->withErrors(['msc' => self::ERROR]);
		}



    	$image = $request->file('image');
    	if (!is_null($image))
		{
//			dd(12);
			$userAbout = Auth::user()->about->img;
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
