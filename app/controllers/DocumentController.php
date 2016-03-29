<?php

class DocumentController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function create()
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
	public function waiting_apply()
	{
		//
		return View::make('departments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function has_ejected()
	{
		//
		$department = new Department();
		$department->name       = Input::get('name');

		$department->save();

		return Redirect::route("departments-index");
	}



}