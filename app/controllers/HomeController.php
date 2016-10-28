<?php

class HomeController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		$data["videos"] = Video::all(array('id','titleV','titleE','thumbnail','duration','duration2'))->take(100);
		
		return View::make('home',$data);
	}
	//get detail video when click thumbnail
	//send ajax to this function then return response
	public function get_video($id)
	{

	}
}

