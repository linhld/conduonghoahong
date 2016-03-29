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
		array('as' => 'department-create-post',
			'uses' => 'DepartmentController@store'
	));
});



/* Authenticated group */
Route::group(array('before' => 'auth'), function() {

	/* Sign out (GET) */
	Route::get('/user/sign-out', 
		array('as' => 'user-sign-out',
			'uses' => 'UserController@getSignOut'
	));



	/* CAC ROUTE QUAN LI PHONG BAN */
	//hien danh sach phong ban
	Route::get('/departments',
		array('as' => 'departments-index',
			'uses' => 'DepartmentController@index'
		));
	//tao moi 1 phong ban
	Route::get('/departments/create',
		array('as' => 'departments-create',
			'uses' => 'DepartmentController@create'
		));
	//luu phong ban vao CSDL
	Route::post('/departments/store',
		array('as' => 'departments-store',
			'uses' => 'DepartmentController@store'
		));

	//chinh sua  phong ban
	Route::get('/departments/edit/{id}',
		array('as' => 'departments-edit',
			'uses' => 'DepartmentController@edit'
		));

	//chinh sua  phong ban
	Route::post('/departments/update/{id}',
		array('as' => 'departments-update',
			'uses' => 'DepartmentController@update'
		));

	//xoa phong ban
	Route::get('/departments/destroy/{id}',
		array('as' => 'departments-destroy',
			'uses' => 'DepartmentController@destroy'
		));




	/* CAC ROUTE QUAN LI TAI KHOAN */
	//hien danh sach phong ban
	Route::get('/users',
		array('as' => 'users-index',
			'uses' => 'UserController@index'
		));
	//tao moi 1 phong ban
	Route::get('/users/create',
		array('as' => 'users-create',
			'uses' => 'UserController@create'
		));
	//luu phong ban vao CSDL
	Route::post('/users/store',
		array('as' => 'users-store',
			'uses' => 'UserController@store'
		));

	//chinh sua  phong ban
	Route::get('/users/edit/{id}',
		array('as' => 'users-edit',
			'uses' => 'UserController@edit'
		));

	//chinh sua  phong ban
	Route::post('/users/update/{id}',
		array('as' => 'users-update',
			'uses' => 'UserController@update'
		));

	//xoa phong ban
	Route::get('/users/destroy/{id}',
		array('as' => 'users-destroy',
			'uses' => 'UserController@destroy'
		));




	/* CAC ROUTE QUAN LI cong  van*/
	//hien danh sach phong ban

	Route::get('/document/document-create',
		array('as' => 'document-create',
			'uses' => 'DocumentController@create'
		));

	Route::get('/document/waiting-apply',
		array('as' => 'document-waiting-apply',
			'uses' => 'DocumentController@waiting_apply'
		));

	Route::get('/document/waiting-apply',
		array('as' => 'document-has-ejected',
			'uses' => 'DocumentController@has_ejected'
		));

});


/* Authenticated group */
Route::group(array('before' => 'auth'), function() {
	
	Route::get('/learn/{objectId}',
		array('as' => 'set-learn',
			'uses' => 'LearnController@startLearn'
	));


});
