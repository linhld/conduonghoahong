<?php

class ReceiveDocumentController extends BaseController {

	// ham dung de hien thi trang tao cong van
	public function create()
	{
		// load the view and pass the nerds
		return View::make('receive_documents.create');
	}

	//ham dung de luu tru cong van
	public function store()
	{
		$rules = array();

		foreach( Input::all() as $key => $val)
		  {
		    if( $val == '' )
		    {
		    	Session::flash('global', 'vui lòng nhập thông tin đầy đủ');

		    	return Redirect::back()->withInput();
		    }
		  }

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
		$receive_document->short_content 		= Input::get("short_content");
		$receive_document->document_type 		= Input::get("document_type");
		//Cap nhat trang thai cua no la dang cho xu li
		$receive_document->status				= Config::get("document.receive_status")["waiting_apply"];
		//luu cong van den
		$receive_document->save();

		Session::flash('global','Tạo Công văn thành công');
		// load the view and pass the nerds
		return Redirect::route('home');
	}

	// ham dung de hien thi trang tao cong van
	//Tham số đầu vào: id của document được sửa
	public function edit($document_id)
	{
		$data['document'] = ReceiveDocument::find($document_id);
		// load the view and pass the nerds
		return View::make('receive_documents.edit', $data);
	}

	//ham dung de luu tru cong van khi update
	public function update($document_id)
	{
		$rules = array();

		foreach( Input::all() as $key => $val)
		  {
		    if( $val == '' )
		    {
		    	Session::flash('global', 'vui lòng nhập thông tin đầy đủ');

		    	return Redirect::back()->withInput();
		    }
		  }
		//
		// khoi tao doi tuong Document moi de luu vao
		$receive_document = ReceiveDocument::find($document_id);

		$receive_document->document_code 		= Input::get("document_code");
		$receive_document->from_department 		= Input::get("from_department");
		$receive_document->from_staff 			= Input::get("from_staff");
		$receive_document->title 				= Input::get("title");
		$receive_document->content 				= Input::get("content");
		//$receive_document->time_send 			= Input::get("time_send");
		//$receive_document->time_receive 		= Input::get("time_receive");
		$receive_document->short_content 		= Input::get("short_content");
		//luu cong van den
		$receive_document->save();

		Session::flash('global','sửa Công văn thành công');

		return Redirect::route('home');
	}

	public function destroy($document_id)
	{
		$document = ReceiveDocument::find($document_id);

		$document->delete();

		Session::flash('global','xóa Công văn thành công');

		return Redirect::route('home');
	}

	public function search()
	{
		// load the view and pass the nerds
		return View::make('receive_documents.search');
	}

	public function search_result()
	{
		$query = Input::get('query');
		$field = Input::get('field');

		if( !$query )
		{
			Session::flash('global','Vui lòng nhập vào ô tìm kiếm');

			return Redirect::back();
		}

		$config_role = Config::get('user.role');
		$user_role = Auth::user()->role;

		if( $user_role == $config_role["writer"] or $user_role == $config_role["chef"] )
		{
			$data['documents'] = ReceiveDocument::search( $field, $query );
		}
		else
		{
			$data['documents'] = Auth::user()->get_receive_applies_document( $field, $query );
		}
		// view and pass the nerds
		return View::make('receive_documents.search',$data);
	}

	//danh sach cong van dang cho duyet
	public function waiting_apply()
	{
		//
		$data["documents"] = ReceiveDocument::get_documents('waiting_apply');

		return View::make('receive_documents.waiting-apply', $data);
	}

	//đọc công văn và chọn phòng banid
	//Tham số đầu vào: id của document được đọc
	public function read_and_apply($document_id)
	{
		//
		$data["document"] = ReceiveDocument::find($document_id);

		$data["document_body"] = View::make('receive_documents.read', $data);

		return View::make('receive_documents.read-and-apply', $data);
	}

	//văn thư đọc công văn sau khi giám đốc duyệt
	//và gửi lại cho nhân viên
	//Tham số đầu vào: id của document được đọc
	public function read_and_send_staff($document_id)
	{
		//
		$data["document"] = ReceiveDocument::find($document_id);

		$data["document_body"] = View::make('receive_documents.read', $data);

		return View::make('receive_documents.read-and-send-staff', $data);
	}

	//đọc công văn
	//Tham số đầu vào: id của document được đọc
	public function read($document_id)
	{
		//
		$data["document"] = ReceiveDocument::find($document_id);

		return View::make('receive_documents.staff-read', $data);
	}

	//thuc hien cac tac vu voi cong van den
	public function action($document_id)
	{
		$action = Input::get("action");
		//
		$document = ReceiveDocument::find($document_id);

		switch($action){
			case "apply":
				//neu nhu status cua cong van nay la dang cho duyet thi moi thuc hien duyet cong van nay
				if( $document->status == Config::get("document.receive_status")["waiting_apply"] )
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

					$document->status = Config::get("document.receive_status")["applied"];
					$document->save();
				}
			break;

			case "eject":
				//neu nhu status cua cong van nay la dang cho duyet thi moi thuc hien eject cong van nay
				if( $document->status == Config::get("document.receive_status")["waiting_apply"] )
				{
					$document->status = Config::get("document.receive_status")["ejected"];
					$document->save();

					Session::flash('global','từ chối Công văn thành công');
				}
			break;

			case "send_staff":
				//neu nhu status cua cong van nay la da duoc giam doc duyet thi moi thuc hien eject cong van nay
				if( $document->status == Config::get("document.receive_status")["applied"] )
				{
					$document->status = Config::get("document.receive_status")["sent_staff"];
					$document->save();

					Session::flash('global','Gửi Công văn thành công');
				}
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
		$data["documents"] = ReceiveDocument::get_documents('ejected');

		return View::make('receive_documents.ejected', $data);
	}

	//Hien thi nhung cong van da duoc phe duyet
	public function applied()
	{
		//
		$user = Auth::user();

		//neu la van thu thi cho phep xem tat ca cong van da duoc phe duyet
		if( $user->role == Config::get('user.role')['staff'] )
		{
			$data["documents"] = $user->get_receive_applies_document();
		}
		//neu la nhan vien thi xem cac Document duoc gui den nhan vien nay
		else
		{
			$data["documents"] = ReceiveDocument::get_documents('applied');
		}

		return View::make('receive_documents.applied', $data);
	}


	//danh sach cong van dang cho duyet
	public function sent_staff()
	{
		//
		$data["documents"] = ReceiveDocument::get_documents('sent_staff');

		return View::make('receive_documents.sent-staff', $data);
	}

}