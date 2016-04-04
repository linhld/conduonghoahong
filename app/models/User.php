<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	/* Alowing Eloquent to insert data into our database */
	//protected $fillable = array('email', 'username', 'password');
	//Guard Field to Insert data from array
	protected $guarded = array('id', 'password');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password', 'remember_token');

	public function departments()
	{
		return $this->belongsTo("Department","department");
	}

	public function get_receive_applies_document()
	{
//		return $this->hasMany('ReceiveDocument','to_staff')
//					->where("status", Config::get('document.receive_status')['applied'])
//					->get();
		return $this->departments->get_receive_documents();

	}


}
