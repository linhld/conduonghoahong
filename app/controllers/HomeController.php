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

	#
	public function index()
	{
		return View::make('home');
	}

	//get detail video when click thumbnail
	//send ajax to this function then return response
	public function detail()
	{
		//get id of video
		$id = Input::get('id');

		$video = Video::find($id);

		$detail["embed"] = $video->embed;
		$detail["views"] = $video->views;

		return json_encode($detail);
	}
}

