<?php


class OutDocument extends Eloquent {


	/**
	 * khai bao table duoc su dung boi Model .
	 *
	 * @var string
	 */
	protected $table = 'out_documents';

	public static function get_documents($status)
	{
			return self::where("status", Config::get('document.out_status')[$status])->get();
	}

	public static function search($field, $search_query)
	{
		return self::where($field,'like','%'.$search_query.'%')
					->get();
	}

	public function get_name_of_type()
	{
		return DB::table('document_types')->whereId($this->document_type)->first()->name;
	}

	public static function get_stat($start_date, $end_date, $document_type)
	{
		//neu nhu type = 0, nghia la chua chon linh vuc, thi tim tat ca linh vuc
		if ($document_type == 1 ) 
			return self::whereBetween('time_send', array($start_date, $end_date) )
					->count();

		return self::whereBetween('time_send', array($start_date, $end_date) )
					->where('document_type', $document_type)
					->count();
	}
}
