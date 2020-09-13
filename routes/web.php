<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/** Guest **/

Route::get('/', 'Guest\GuestController@index')->name('guest.index');


Auth::routes(['reset' => false]);



/** Users **/

$groupData = [
	'namespace' => 'Users',
	'prefix' => '/',
	'middleware' => 'auth',
];

Route::group($groupData, function ()
{
	Route::resource('/my', 'IndexController')->names('user.my');


	Route::resource('/gallery', 'GalleryController')->names('user.gallery');
	Route::get('/gallery/{id}/gallery', 'GalleryController@showGalleryPerson')->name('user.gallery.showGalleryPerson');


	Route::resource('/news', 'NewsController')->names('user.news');


	Route::resource('/friends', 'FriendsController')->names('user.friends');
	

	Route::get('/friends/delete/{id}', 'FriendsController@deleteFriend')->name('user.friends.delete');


	Route::get('/friend/request', 'FriendsController@requests')->name('user.friends.requests');
	Route::get('/friend/subscribe', 'FriendsController@subscribe')->name('user.friends.subscribe');
	Route::get('/friend/search', 'FriendsController@search')->name('user.friends.search');


	/** API **/
	Route::post('/api/my/edit', 'IndexController@updateEdit');
	Route::post('/api/my/update', 'IndexController@updateImage');
	Route::post('/api/my/wall', 'IndexController@storeWall');

	Route::post('/api/gallery/comment', 'GalleryController@storeComment');
	Route::post('/api/gallery/store', 'GalleryController@storeImage');
	Route::post('/api/gallery/destroy', 'GalleryController@destroyImage');
	Route::post('/api/gallery/like', 'GalleryController@postLike');

	Route::post('/friend/add', 'FriendsController@postAddFriend');
	Route::post('/friend/accept', 'FriendsController@postAccept');
	Route::post('/friend/delete', 'FriendsController@postDelete');
});





