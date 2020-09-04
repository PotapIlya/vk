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


Auth::routes();



/** Users **/

$groupData = [
	'namespace' => 'Users',
	'prefix' => '/',
	'middleware' => 'auth',
];

Route::group($groupData, function ()
{
	Route::resource('/my', 'IndexController')->names('user.index');

});



