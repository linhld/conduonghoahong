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
		$data["videos"] = Video::select('id','titleV','titleE','thumbnail','duration')
								->orderBy('id', 'desc')
								->paginate(40);
		
		return View::make('home',$data);
	}
	
	public function filter()
	{
		$off_cate = Input::get('off_cate');

		$data['videos'] = Video::whereNotIn('cate_id', $off_cate)
							->join('cate_video', 'cate_video.video_id', '=', 'videos.id')
							->distinct('videos.id')
							->select('videos.id','videos.titleV','videos.titleE','videos.thumbnail','videos.duration')
							->orderBy('id', 'desc')
							->paginate(40);

		return View::make('filter',$data);
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

