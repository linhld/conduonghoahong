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
		'uses' => 'HomeController@index'
	)
);

Route::post('/filter', 
	array('as' => 'home',
		'uses' => 'HomeController@filter'
	)
);

Route::post('/detail', 
	array('as' => 'home',
		'uses' => 'HomeController@detail'
	)
);
