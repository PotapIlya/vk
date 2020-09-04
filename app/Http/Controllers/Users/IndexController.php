<?php

namespace App\Http\Controllers\Users;

use App\Components\ImageUploads;
use App\Http\Controllers\Users\BaseUserController;
use Illuminate\Http\Request;
use Auth;

class IndexController extends BaseUserController
{

	private $imageUploads;

	public function __construct(ImageUploads $imageUploads
	)
	{
		parent::__construct();

		$this->imageUploads = $imageUploads;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
		return view('user.my.index');
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
    	$image = $request->file('image');
    	if (!is_null($image))
		{
			$this->imageUploads->upload($image);
		}

    	return redirect()->back()->with(['success' => 'Сохранено!']);
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
