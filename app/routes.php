<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.

|*/



Route::get('/', 
	array('as' => 'home', 
		'uses' => 'HomeController@home'
));


/* CSRF protection */
Route::group(array('before' => 'guest'), function() {

	Route::get('/user/register',
		array('as' => 'user-register',
			'uses' => 'UserController@getRegister'
	));

	Route::get('/user/login',
		array('as' => 'user-login',
			'uses' => 'UserController@getLogin'
	));
});



Route::group(array('before'=>'csrf'), function(){
	/* Create an account (POST) */
	Route::post('/user/register', 
		array('as' => 'user-register-post',
			'uses' => 'UserController@postRegister'
	));
	Route::post('/user/login', 
		array('as' => 'user-login-post',
			'uses' => 'UserController@postLogin'
	));
		//Create new Sets
	Route::post('/set/create',
		array('as' => 'set-create-post',
			'uses' => 'SetController@postCreate'
	));
});



/* Authenticated group */
Route::group(array('before' => 'auth'), function() {

	/* Sign out (GET) */
	Route::get('/user/sign-out', 
		array('as' => 'user-sign-out',
			'uses' => 'UserController@getSignOut'
	));

});


/* Authenticated group */
Route::group(array('before' => 'auth'), function() {
	
	Route::get('/learn/{objectId}',
		array('as' => 'set-learn',
			'uses' => 'LearnController@startLearn'
	));


});
