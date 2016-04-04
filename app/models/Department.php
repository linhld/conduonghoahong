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

	public function get_receive_documents()
	{
		$documents = DocumentDepartment::where('department_id',$this->id)->lists('document_id');

		if( !empty($documents) )
		   return ReceiveDocument::whereIn('id',$documents)->get();

		return array();
	}
}
