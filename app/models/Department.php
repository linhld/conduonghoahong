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

	public function get_receive_documents($field = '', $search_query = '')
	{
		$documents = DocumentDepartment::where('department_id',$this->id)->lists('document_id');

		if( !empty($documents) )
		{
			if( !empty($search_query) )
				return  ReceiveDocument::whereIn('id',$documents)
							->where($field,'like','%'.$search_query.'%')
							->get();
							
		   return ReceiveDocument::whereIn('id',$documents)->get();
		}

		return array();
	}

	public function get_out_documents($field = '', $search_query = '')
	{
		$documents = $this->hasMany('OutDocument', 'send_by_department');

		if( !empty($documents) )
		{
			if( !empty($search_query) )
				return  $documents->where( $field,'like','%'.$search_query.'%' )
									->get();
		}

		return array();
	}
}
