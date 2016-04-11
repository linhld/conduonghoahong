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

	public static function search($query)
	{
		return self::where('title', 'like', '%'.$query.'%')->get();
	}
}
