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

        $data['user']           = verifySession('user','/admin/login'); //admin_helper
        $data['url_current']    = Request::path();        

        if($_POST)
            $returnInsertUser       = User::saveUser($_POST);
        else
            $message = showAlerts('error',Config::get('messages.user.error.cadastro') ); //config/messages


        if ($returnInsertUser)
            $message = showAlerts('success',Config::get('messages.user.success.cadastro') ); //config/messages 
                                        
     
        // Busca lista de usuários cadastrados
        $users = User::getAll();
        if ($users)
            $data['userslist'] = $users;        

        return Redirect::to(url('/admin/usuarios'))->with('message', $message );
    }

    public function remove ($id) {

        $returnId = User::removeUser($id);
        if ($returnId)
             return Redirect::back()->with('message', showAlerts('success',Config::get('messages.user.success.remove')) );
         else
             return Redirect::back()->with('message', showAlerts('success',Config::get('messages.user.error.remove')) );
            
    }

}