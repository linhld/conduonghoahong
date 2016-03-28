<?php

class DepartmentController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// get all the nerds
		$data["departments"] = Department::all();

		// load the view and pass the nerds
		return View::make('departments.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('departments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$department = new Department();
		$department->name       = Input::get('name');

		$department->save();

		return Redirect::route("departments-index");
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
		$department = Department::find($id);

		$data["department"] = $department;

		return View::make("departments.edit",$data);
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
		$department = Department::find($id);
		$department->name = $new_name;
		$department->save();

		return Redirect::route("departments-index");
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
		$department = Department::find($id);
		//xoa phong ban nay
		$department->delete();

		return Redirect::route("departments-index");
	}

}