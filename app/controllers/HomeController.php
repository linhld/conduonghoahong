<?php

class HomeController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| Controller nay dung de quan li trang Home cua cac user co role khac nhau
	|
	*/

	public function home()
	{
		//neu user nay da dang nhap vao he thong
		if(Auth::check())
		{
			switch(Auth::user()->role )
			{
				//Voi moi role thi hien thi View khac nhau
				case Config::get("user.role")["admin"]:
					return View::make('home.admin');

				case Config::get("user.role")["staff"]:
					return View::make('home.staff');

				case Config::get("user.role")["chef"]:
					return View::make('home.chef');

				default:
					return View::make('home.staff');
			}
		}
		//con khong se return ve trang Dang nhap
		return View::make('home.guest');
	}

}

