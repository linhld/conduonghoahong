<?php


class Department extends Eloquent {


	/**
	 * khai bao table duoc su dung boi Model .
	 *
	 * @var string
	 */
	protected $table = 'departments';

	public function get_staff_list()
	{
		return $this->hasMany('User','department','id');
	}

	public function get_receive_documents($search_query = '')
	{
		$documents = DocumentDepartment::where('department_id',$this->id)->lists('document_id');

		if( !empty($documents) )
		{
			if( !empty($search_query) )
				return  ReceiveDocument::whereIn('id',$documents)
							->where('title','like','%'.$search_query.'%')
							->get();
							
		   return ReceiveDocument::whereIn('id',$documents)->get();
		}

		return array();
	}

	public function get_out_documents($search_query = '')
	{
		$staff_list = $this->get_staff_list()->lists('id');

		$documents = OutDocument::whereIn('send_by', $staff_list);

		if( !empty($documents) )
		{
			if( !empty($search_query) )
				return  $documents->where('title','like','%'.$search_query.'%')
									->get();
		}

		return array();
	}
}
