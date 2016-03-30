<?php

class DocumentController extends BaseController {

	// ham dung de hien thi trang tao cong van
	public function create_receive()
	{
		// load the view and pass the nerds
		return View::make('documents.create-receive-document');
	}

	//ham dung de luu tru cong van
	public function store_receive()
	{
		//
		// khoi tao doi tuong Document moi de luu vao
		$receive_document = new ReceiveDocument();

		$receive_document->document_code 		= Input::get("document_code");
		$receive_document->from_department 		= Input::get("from_department");
		$receive_document->from_staff 			= Input::get("from_staff");
		$receive_document->title 				= Input::get("title");
		$receive_document->content 				= Input::get("content");
		$receive_document->time_send 			= Input::get("time_send");
		$receive_document->time_receive 		= Input::get("time_receive");
		$receive_document->to_department 		= Input::get("to_department");
		$receive_document->to_staff 			= Input::get("to_staff");
		$receive_document->short_content 		= Input::get("short_content");
		//Cap nhat trang thai cua no la dang cho xu li
		$receive_document->status				= Config::get("document.status")["income_wait_apply"];
		//luu cong van den
		$receive_document->save();

		// load the view and pass the nerds
		return Redirect::route('home');
	}

	// ham dung de hien thi trang tao cong van
	public function create_out_document()
	{
		// load the view and pass the nerds
		return View::make('documents.create-out-document');
	}

	//ham dung de luu tru cong van
	public function store_out_document()
	{
		//
		// get all the nerds
		$data["departments"] = Department::all();

		// load the view and pass the nerds
		return View::make('documents.create-receive-document', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function waiting_apply()
	{
		//
		return View::make('documents.waiting-apply');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function has_ejected()
	{
		//
		return View::make('documents.waiting-apply');
	}



}