<?php


class ReceiveDocument extends Eloquent {


	/**
	 * khai bao table duoc su dung boi Model .
	 *
	 * @var string
	 */
	protected $table = 'receive_documents';
	
	public static function get_documents($status)
	{
		return self::where("status", Config::get('document.receive_status')[$status])->get();
	}

	public function get_name_of_type()
	{
		return DB::table('document_types')->whereId($this->document_type)->first()->name;
	}

	public static function search($field, $query)
	{
		return self::where($field, 'like', '%'.$query.'%')
					->get();
	}

	public static function get_stat($start_date, $end_date, $document_type)
	{
		//neu nhu type = 0, nghia la chua chon linh vuc, thi tim tat ca linh vuc
		if ($document_type == 1 ) 
			return self::whereBetween('time_receive', array($start_date, $end_date) )
					->count();

		return self::whereBetween('time_receive', array($start_date, $end_date) )
					->where('document_type', $document_type)
					->count();
	}
}
