<?php
class Video extends Eloquent {


	/**
	 * khai bao table duoc su dung boi Model .
	 *
	 * @var string
	 */
	protected $table = 'videos';
	
	public function filter_video()
	{
		
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
}
