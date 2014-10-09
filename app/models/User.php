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
	protected $table 		= 'users';
	protected $primaryKey 	= 'usr_id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');


	static function getAll(){
		return DB::table('users')->get();
	}

	static function getUserByMail($mail){
		$query = DB::table('users')
						->select('usr_name','usr_pass','usr_status','usr_level')
						->where('usr_mail',$mail)
						->get();
		
		if (sizeof($query) > 0 ){
			return $query;
		}else{
			return false;
		}

	}	


}
