<?php

class OutDocumentController extends BaseController {

	// ham dung de hien thi trang tao cong van
	public function create()
	{
		// load the view and pass the nerds
		return View::make('out_documents.create');
	}

	//ham dung de luu tru cong van
	public function store()
	{
		//
		// khoi tao doi tuong Document moi de luu vao
		$out_document = new OutDocument();

		$out_document->document_receive_code 	= Input::get("document_receive_code");
		$out_document->document_out_code 		= Input::get("document_out_code");

		$out_document->from_department 		= Input::get("from_department");
		$out_document->from_staff 			= Input::get("from_staff");

		$out_document->to_department 		= Input::get("to_department");
		$out_document->to_staff 			= Input::get("to_staff");

		$out_document->title 				= Input::get("title");
		$out_document->content 				= Input::get("content");
		$out_document->time_send 			= Input::get("time_send");
		$out_document->short_content 		= Input::get("short_content");
		$out_document->document_type 		= Input::get("document_type");
		//Cap nhat trang thai cua no la dang cho xu li
		$out_document->status				= Config::get("document.out_status")["waiting_accept"];
		//ghi lai xem cong van nay dpuoc gui boi nguoi nao
		$out_document->send_by				= Auth::id();
		//luu cong van den
		$out_document->save();

		Session::flash('global','Tạo Công văn đi thành công');
		// load the view and pass the nerds
		return Redirect::route('home');
	}

	// ham dung de hien thi trang tao cong van
	//Tham số đầu vào: id của document được sửa
	public function edit($document_id)
	{
		$data['document'] = OutDocument::find($document_id);
		// load the view and pass the nerds
		return View::make('out_documents.edit', $data);
	}


	public function review($document_id)
	{
		$data['document'] = OutDocument::find($document_id);
		// load the view and pass the nerds
		return View::make('out_documents.review', $data);
	}

	//ham dung de luu tru cong van khi update
	public function update($document_id)
	{
		//
		// khoi tao doi tuong Document moi de luu vao
		$out_document = OutDocument::find($document_id);

		$out_document->document_out_code 		= Input::get("document_out_code");
		$out_document->document_receive_code 	= Input::get("document_receive_code");

		$out_document->from_department 		= Input::get("from_department");
		$out_document->from_staff 			= Input::get("from_staff");
		$out_document->to_department 		= Input::get("to_department");
		$out_document->to_staff 			= Input::get("to_staff");
		$out_document->title 				= Input::get("title");
		$out_document->content 				= Input::get("content");
		$out_document->time_send 			= Input::get("time_send");

		$out_document->short_content 		= Input::get("short_content");
		$out_document->document_type 		= Input::get("document_type");
		//luu cong van den
		$out_document->save();

		// load the view and pass the nerds
		return Redirect::route('home');
	}


	//danh sach cong van dang cho duyet
	public function waiting_apply()
	{
		//
		$data["documents"] = OutDocument::get_documents('accepted');

		return View::make('out_documents.waiting-apply', $data);
	}

	//danh sach cong van dang cho duyet
	public function waiting_accept()
	{
		//
		$data["documents"] = OutDocument::get_documents('waiting_accept');

		return View::make('out_documents.waiting-accept', $data);
	}

	//đọc công văn và chọn phòng banid
	//Tham số đầu vào: id của document được đọc
	public function read_and_apply($document_id)
	{
		//
		$data["document"] = OutDocument::find($document_id);

		$data["document_body"] = View::make('out_documents.read', $data);

		return View::make('out_documents.read-and-apply', $data);
	}


	//đọc công văn
	//Tham số đầu vào: id của document được đọc
	public function read($document_id)
	{
		//
		$data["document"] = OutDocument::find($document_id);

		return View::make('out_documents.staff-read', $data);
	}

	//thuc hien cac tac vu voi cong van den
	public function action($document_id)
	{
		$action = Input::get("action");
		//
		$document = OutDocument::find($document_id);

		switch($action){
			case "accept":
				//neu nhu status cua cong van nay la dang cho duyet thi moi thuc hien duyet cong van nay
				if( $document->status == Config::get("document.out_status")["waiting_accept"] )
				{
					$document->document_out_code 		= Input::get("document_out_code");
					$document->document_receive_code 		= Input::get("document_receive_code");

					$document->from_department 		= Input::get("from_department");
					$document->from_staff 			= Input::get("from_staff");
					$document->to_department 		= Input::get("to_department");
					$document->to_staff 			= Input::get("to_staff");
					$document->title 				= Input::get("title");
					$document->content 				= Input::get("content");
					$document->time_send 			= Input::get("time_send");
					$document->short_content 		= Input::get("short_content");
					$document->document_type 		= Input::get("document_type");

					$document->status				= Config::get('document.out_status')["accepted"];
					//luu cong van den
					$document->save();

					Session::flash('global','đã gửi lên chờ lãnh đạo phê duyệt thành công');
				}
			break;

			case "no_accept":
				Session::flash('global','đã từ chối công văn đi');
			break;

			case "apply":
				//neu nhu status cua cong van nay la da duoc chap nhan, da qua kiem duyet cua Van Thu
				if( $document->status == Config::get("document.out_status")["accepted"] )
				{
					$document->status = Config::get("document.out_status")["applied"];
					$document->save();
				}
			break;

			case 'eject':
				//neu nhu status cua cong van nay la da duoc chap nhan, da qua kiem duyet cua Van Thu
				if( $document->status == Config::get("document.out_status")["accepted"] )
				{
					$document->status = Config::get("document.out_status")["ejected"];
					$document->save();
				}
			break;

			case "store":
			break;

			default:

			break;
		}

		return Redirect::route('home');
	}




	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function ejected()
	{
		//
		$data["documents"] = OutDocument::get_documents('ejected');

		return View::make('out_documents.ejected', $data);
	}

	//Hien thi nhung cong van da duoc phe duyet
	public function applied()
	{
		//
		$user = Auth::user();

		//neu la van thu thi cho phep xem tat ca cong van da duoc phe duyet
		if( $user->role == Config::get('user.role')['writer'] )
		{
			$data["documents"] = OutDocument::get_documents('applied');
		}
		//neu la nhan vien thi xem cac Document duoc gui den nhan vien nay
		else
		{
			$data["documents"] = $user->get_receive_applies_document();
		}

		return View::make('out_documents.applied', $data);
	}

}