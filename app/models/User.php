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

	public function get_department()
	{
		return $this->belongsTo("Department","department");
	}

	public static function registerValidator()
	{
		return array(
					'email' 		=> 'required|max:50|email|unique:users',
					'username'		=> 'required|alpha_dash|max:20|min:3|unique:users',
					'password'		=> 'required|min:6',
					'password_again'=> 'required|same:password'
				);
	}

	function loginValidator()
	{
		return array(
					'username' 	=> 'required',
					'password'	=> 'required'
				);
	}
}
