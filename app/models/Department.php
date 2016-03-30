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
}
