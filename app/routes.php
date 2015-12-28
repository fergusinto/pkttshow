<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/mindex', function(){
		return View::make('mindex');
});

Route::get('/mchannel', function(){
		return View::make('mchannel');
});

Route::get('/mpopularity', function(){
		return View::make('mpopularity');
});

Route::get('/mlogin', function(){
		return View::make('mlogin');
});

Route::get('/mcontent', function(){
		return View::make('mcontent');
});

Route::get('/msearch', function(){
		return View::make('msearch');
});

Route::get('/mmyitem', function(){
		return View::make('mmyitem');
});

Route::get('/mtpermission', function(){
		return View::make('mtpermission');
});

Route::get('/mmerrygame', function(){
		return View::make('mmerrygame');
});

Route::get('/maward', function(){
		return View::make('maward');
});

// 若產生404頁面的話
App::missing(function($exception)
{
	$get_request_uri = Request::server('REQUEST_URI');
	return Redirect::to("/mindex");
});
