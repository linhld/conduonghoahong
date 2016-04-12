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

	public static function search($search_query)
	{
		return self::where('title','like','%'.$search_query.'%')->get();
	}

	public function get_name_of_type()
	{
		return DB::table('document_types')->whereId($this->document_type)->first()->name;
	}
}
