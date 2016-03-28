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
		//
		$User = new User();
		$User->name       = Input::get('name');

		$User->save();

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

}