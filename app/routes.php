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


//Trang chu cua website
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

	//luu cac thong tin chinh sua phong ban vao CSDL
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


	//ROUTE QUAN LI CONG VAN DEN
	//danh sach cac cong van bi tu choi
	Route::get('/document/receive-read/{id}',
		array('as' => 'document-receive-read',
			'uses' => 'ReceiveDocumentController@read'
		));

	Route::get('/document/receive-create',
		array('as' => 'document-receive-create',
			'uses' => 'ReceiveDocumentController@create'
		));

	Route::post('/document/receive-store',
		array('as' => 'document-receive-store',
			'uses' => 'ReceiveDocumentController@store'
		));

	Route::get('/document/receive-edit/{id}',
		array('as' => 'document-receive-edit',
			'uses' => 'ReceiveDocumentController@edit'
		));

	Route::post('/document/receive-update/{id}',
		array('as' => 'document-receive-update',
			'uses' => 'ReceiveDocumentController@update'
		));

	Route::get('/document/receive-destroy/{id}',
		array('as' => 'document-receive-destroy',
			'uses' => 'ReceiveDocumentController@destroy'
		));

	//danh sach cong van dang cho duyet
	Route::get('/document/receive-waiting-apply',
		array('as' => 'document-receive-waiting-apply',
			'uses' => 'ReceiveDocumentController@waiting_apply'
		));
	//danh sach cac cong van bi tu choi
	Route::get('/document/receive-ejected',
		array('as' => 'document-receive-ejected',
			'uses' => 'ReceiveDocumentController@ejected'
		));

	//danh sach cac cong van bi tu choi
	Route::get('/document/receive-applied',
		array('as' => 'document-receive-applied',
			'uses' => 'ReceiveDocumentController@applied'
		));

	//danh sach cac cong van bi tu choi
	Route::get('/document/receive-read-and-apply/{id}',
		array('as' => 'document-receive-read-and-apply',
			'uses' => 'ReceiveDocumentController@read_and_apply'
		));

	// danh cho giam doc thuc hien cac tac vu cho cong van den
	Route::post('/document/receive-action/{id}',
		array('as' => 'document-receive-action',
			'uses' => 'ReceiveDocumentController@action'
		));

	//TIM KIEM cong
	Route::get('/search/receive',
		array('as' => 'document-receive-search',
			'uses' => 'ReceiveController@search'
		));





	//ROUTE QUAN LI CONG VAN DI
	//danh sach cac cong van bi tu choi
	Route::get('/document/out-read/{id}',
		array('as' => 'document-out-read',
			'uses' => 'OutDocumentController@read'
		));

	Route::get('/document/out-create',
		array('as' => 'document-out-create',
			'uses' => 'OutDocumentController@create'
		));

	Route::post('/document/out-store',
		array('as' => 'document-out-store',
			'uses' => 'OutDocumentController@store'
		));

	Route::get('/document/out-edit/{id}',
		array('as' => 'document-out-edit',
			'uses' => 'OutDocumentController@edit'
		));

	Route::get('/document/out-review/{id}',
		array('as' => 'document-out-review',
			'uses' => 'OutDocumentController@review'
		));

	Route::post('/document/out-update/{id}',
		array('as' => 'document-out-update',
			'uses' => 'OutDocumentController@update'
		));

	Route::get('/document/out-destroy/{id}',
		array('as' => 'document-out-destroy',
			'uses' => 'OutDocumentController@destroy'
		));

	//danh sach cong van dang cho duyet
	Route::get('/document/out-waiting-apply',
		array('as' => 'document-out-waiting-apply',
			'uses' => 'OutDocumentController@waiting_apply'
		));

	//danh sach cong van dang cho duyet
	Route::get('/document/out-waiting-accept',
		array('as' => 'document-out-waiting-accept',
			'uses' => 'OutDocumentController@waiting_accept'
		));

	//danh sach cac cong van bi tu choi
	Route::get('/document/out-ejected',
		array('as' => 'document-out-ejected',
			'uses' => 'OutDocumentController@ejected'
		));

	//danh sach cac cong van bi tu choi
	Route::get('/document/out-applied',
		array('as' => 'document-out-applied',
			'uses' => 'OutDocumentController@applied'
		));

	//danh sach cac cong van bi tu choi
	Route::get('/document/out-read-and-apply/{id}',
		array('as' => 'document-out-read-and-apply',
			'uses' => 'OutDocumentController@read_and_apply'
		));

	// danh cho giam doc thuc hien cac tac vu cho cong van den
	Route::post('/document/out-action/{id}',
		array('as' => 'document-out-action',
			'uses' => 'OutDocumentController@action'
		));

	//TIM KIEM cong
	Route::get('/search/out',
		array('as' => 'document-out-search',
			'uses' => 'OutController@search'
		));
	




	//TIM KIEM PHONG BAN
	Route::get('/search/department',
		array('as' => 'department-search',
			'uses' => 'DepartmentController@search'
		));


});

Route::post('/get_department_staff',
	array('as' => 'get_department_staff',
		'uses' => 'DepartmentController@get_staff'
	));


/* Authenticated group */
Route::group(array('before' => 'auth'), function() {
	
	Route::get('/learn/{objectId}',
		array('as' => 'set-learn',
			'uses' => 'LearnController@startLearn'
	));


});
