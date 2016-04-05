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
		$out_document->title 				= Input::get("title");
		$out_document->content 				= Input::get("content");
		$out_document->time_send 			= Input::get("time_send");
		$out_document->short_content 		= Input::get("short_content");
		$out_document->document_type 		= Input::get("document_type");
		//Cap nhat trang thai cua no la dang cho xu li
		$out_document->status				= Config::get("document.out_status")["waiting_apply"];
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

	//ham dung de luu tru cong van khi update
	public function update($document_id)
	{
		//
		// khoi tao doi tuong Document moi de luu vao
		$out_document = OutDocument::find($document_id);

		$out_document->document_code 		= Input::get("document_code");
		$out_document->from_department 		= Input::get("from_department");
		$out_document->from_staff 			= Input::get("from_staff");
		$out_document->title 				= Input::get("title");
		$out_document->content 				= Input::get("content");
		$out_document->time_send 			= Input::get("time_send");
		$out_document->time_receive 		= Input::get("time_receive");
		$out_document->short_content 		= Input::get("short_content");
		//luu cong van den
		$out_document->save();

		// load the view and pass the nerds
		return Redirect::route('home');
	}

	//danh sach cong van dang cho duyet
	public function waiting_apply()
	{
		//
		$data["documents"] = OutDocument::get_documents('waiting_apply');

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
			case "apply":

				//neu nhu status cua cong van nay la dang cho duyet thi moi thuc hien duyet cong van nay
				if( $document->status == Config::get("document.out_status")["waiting_apply"] )
				{
					$to_departments = Input::get('to_department');


					//Voi moi Department duoc chon trong checkbox, Tao them mot dong Trong bang Document Department
					foreach($to_departments as $department_id)
					{
						//Tao them mot dong Trong bang Document Department
						$document_department = new DocumentDepartment();

						$document_department->document_id = $document_id;
						$document_department->department_id = $department_id;

						$document_department->save();
					}

					Session::flash('global','xét duyệt thành công');

					$document->status = Config::get("document.out_status")["applied"];
					$document->save();
				}

			case "eject":
				//neu nhu status cua cong van nay la dang cho duyet thi moi thuc hien eject cong van nay
				if( $document->status == Config::get("document.out_status")["waiting_apply"] )
				{
					$document->status = Config::get("document.out_status")["ejected"];
					$document->save();
				}
			case "store":

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