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
						->select('usr_name','usr_pass','usr_status','usr_level','usr_id')
						->where('usr_mail',$mail)
						->get();
		
		if (sizeof($query) > 0 ){
			return $query;
		}else{
			return false;
		}

	}

	static function getUserById($user_id){
		$query = DB::table('users')
						->select('usr_name','usr_pass','usr_status','usr_level','usr_id','usr_mail')
						->where('usr_id',$user_id)
						->get();
		
		if (sizeof($query) > 0 ){
			return $query;
		}else{
			return false;
		}

	}	

	static function saveUser ($arr_user_data){
        
		$array = array(	
						'created_at'		=> date("Y-m-d H:i:s",time()), 
						'updated_at'		=> date("Y-m-d H:i:s",time()), 
						'usr_mail'			=> $arr_user_data['inputmail'], 
						'usr_name' 			=> $arr_user_data['inputname'], 
						'usr_pass' 			=> Hash::make($arr_user_data['inputpass']), 
						'usr_status' 		=> $arr_user_data['submit-type'], 
						'usr_level' 		=> 1);

        $id = DB::table('users')
        				->insertGetId($array);

        if ($id > 0)
        	return $id;
        else
        	return False;
	}

	static function removeUser ($user_id){
		$remove =  DB::table('users')
		->where('usr_id',$user_id)
		->delete();

		if ($remove > 0)
			return true;
		else
			return false;
	}

	static function updateUser ($user_id,$array) {

		if ( isset($array['usr_pass']) && $array['usr_pass'] != "" ) {
			$array = array(	
							'updated_at'		=> date("Y-m-d H:i:s",time()), 
							'usr_mail'			=> $array['inputmail'], 
							'usr_name' 			=> $array['inputname'], 
							'usr_pass' 			=> Hash::make($array['inputpass']), 
							'usr_status' 		=> $array['submit-type'], 
							'usr_level' 		=> 1);

		}else{
			$array = array(	
							'updated_at'		=> date("Y-m-d H:i:s",time()), 
							'usr_mail'			=> $array['inputmail'], 
							'usr_name' 			=> $array['inputname'], 
							'usr_status' 		=> $array['submit-type'], 
							'usr_level' 		=> 1);
		} 

        $id = DB::table('users')
        				->where('usr_id', $user_id)
        				->update($array);

        if ($id > 0)
        	return $id;
        else
        	return False;

	}

}
