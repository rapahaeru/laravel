<?php


class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function showUsers()
    {

        $data['user']           = verifySession('user','/admin/login'); //admin_helper
        $data['url_current']    = Request::path();

        $users = User::getAll();
        if ($users)
            $data['userslist'] = $users;
        
		return View::make('admin.userlist',$data);
    }

    public function newUser(){

        $data['user']           = verifySession('user','/admin/login'); //admin_helper
        $data['url_current']    = Request::path();

        return View::make('admin.user',$data);   
    }

    public function insert(){

        var_dump($_POST);

        //$data['user']           = verifySession('user','/admin/login'); //admin_helper
        //$data['url_current']    = Request::path();

        //return View::make('admin.user',$data);   
    }

}