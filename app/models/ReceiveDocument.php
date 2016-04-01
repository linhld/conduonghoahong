<?php


class ReceiveDocument extends Eloquent {


	/**
	 * khai bao table duoc su dung boi Model .
	 *
	 * @var string
	 */
	protected $table = 'receive_documents';

	public static function get_waiting_apply_documents()
	{
		return self::where("status", Config::get('document.receive_status')["waiting_apply"])->get();
	}

	public static function get_ejected_documents()
	{
		return self::where("status", Config::get('document.receive_status')["ejected"])->get();
	}

	public static function get_applied_documents()
	{
		return self::where("status", Config::get('document.receive_status')["applied"])->get();
	}

	public function get_name_of_type()
	{
		return DB::table('document_types')->whereId($this->document_type)->first()->name;
	}
}
