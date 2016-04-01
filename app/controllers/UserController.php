<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// get all the nerds
		$data["users"] = User::all();

		// load the view and pass the nerds
		return View::make('users.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//luu thong tin user vao CSDL
		$user = new User();

		$user->name       	= Input::get('name');
		$user->username    	= Input::get('username');
		//ma hoa password lay tu Input truoc khi luu vao
		$user->password    	= Hash::make( Input::get('password') );
		$user->department	= Input::get('department');
		$user->role			= Input::get('role');

		$user->save();

		return Redirect::route("users-index");
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$User = User::find($id);

		$data["user"] = $User;

		return View::make("users.edit",$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//lay ten can chinh sua cua phong ban
		$new_name = Input::get("name");
		//cap nhat vao CSDL
		$User = User::find($id);
		$User->name = $new_name;
		$User->save();

		return Redirect::route("users-index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$User = User::find($id);
		//xoa phong ban nay
		$User->delete();

		return Redirect::route("users-index");
	}


	//Get Login page
	/**
	 * Create a new cache repository with the given implementation.
	 *
	 * @param  \Illuminate\Cache\StoreInterface  $store
	 * @return \Illuminate\Cache\Repository
	 */
	public function getLogin()
	{
		return View::make('home.guest');
	}
	//Check user Login
	/**
	 * Create a new cache repository with the given implementation.
	 *
	 * @param  \Illuminate\Cache\StoreInterface  $store
	 * @return \Illuminate\Cache\Repository
	 */
	public function postLogin()
	{
			// record
			$dataAttempt = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);

			//attempt Login
			$auth = Auth::attempt($dataAttempt,true);

			if($auth)
			{
				// Redirect to the intented page
				// For example, a user will be redirected to '/
				// when the user tried to change password without login'
				return Redirect::intended('/');
			}
			else
			{
				return Redirect::back()
					->with('global', 'Tên đăng nhập hoặc mật khẩu không đúng.');
			}

			return Redirect::back()
				->with('global', 'There is a problem.');
	}

	/**
	 * Create a new cache repository with the given implementation.
	 *
	 * @param  \Illuminate\Cache\StoreInterface  $store
	 * @return \Illuminate\Cache\Repository
	 */
	public function getSignOut()
	{
		Auth::logout();

		return Redirect::route('home');
	}
}