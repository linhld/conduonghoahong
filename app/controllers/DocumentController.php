<?php

class DocumentController extends BaseController {

	// ham dung de hien thi trang tao cong van
	public function receive_create()
	{
		// load the view and pass the nerds
		return View::make('documents.receive-create');
	}

	//ham dung de luu tru cong van
	public function receive_store()
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
		$receive_document->status				= Config::get("document.receive_status")["wait_apply"];
		//luu cong van den
		$receive_document->save();

		// load the view and pass the nerds
		return Redirect::route('home');
	}

	// ham dung de hien thi trang tao cong van
	public function receive_edit()
	{
		// load the view and pass the nerds
		return View::make('documents.receive-edit');
	}
	//danh sach cong van dang cho duyet
	public function receive_waiting_apply()
	{
		//
		$data["documents"] = ReceiveDocument::get_waiting_apply_documents();

		return View::make('documents.receive-waiting-apply', $data);
	}

	//thuc hien cac tac vu voi cong van den
	public function receive_action($document_id)
	{
		$action = Input::get("action");
		//
		$document = ReceiveDocument::find($document_id);

		switch($action){
			case "apply":
				//neu nhu status cua cong van nay la dang cho duyet thi moi thuc hien duyet cong van nay
				if( $document->status == Config::get("document.receive_status")["waiting_apply"] )
				{
					$document->status = Config::get("document.receive_status")["applied"];
					$document->save();
				}

			case "eject":
				//neu nhu status cua cong van nay la dang cho duyet thi moi thuc hien eject cong van nay
				if( $document->status == Config::get("document.receive_status")["waiting_apply"] )
				{
					$document->status = Config::get("document.receive_status")["ejected"];
					$document->save();
				}
			case "store":

			default:

			break;
		}

		return Redirect::back();
	}




	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function receive_ejected()
	{
		//
		$data["documents"] = ReceiveDocument::get_ejected_documents();

		return View::make('documents.receive-ejected', $data);
	}









	// ham dung de hien thi trang tao cong van
	public function out_create()
	{
		// load the view and pass the nerds
		return View::make('documents.create-out-document');
	}

	//ham dung de luu tru cong van
	public function out_store()
	{
		//
		// get all the nerds
		$data["departments"] = Department::all();

		// load the view and pass the nerds
		return View::make('documents.create-receive-document', $data);
	}





}