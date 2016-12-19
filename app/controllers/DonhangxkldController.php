<?php

class DonhangxkldController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	#
	public function index()
	{
		return View::make('home');
	}

	//get detail video when click thumbnail
	//send ajax to this function then return response
	public function create()
	{
		return View::make('donhangxkld.create');
	}

	//get detail video when click thumbnail
	//send ajax to this function then return response
	public function store()
	{
		Donhangxkld::create(Input::all());
		return View::make('donhangxkld.create');
	}
}

