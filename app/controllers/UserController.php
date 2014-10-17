<?php


class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */

    public function emailExist (){

        if (isset($_POST['mail'])){

            $returnMail = User::getUserByMail($_POST['mail']);
            if ($returnMail)
                return "true";
            else
                return "false";
        }
    }

    public function showUsers()
    {

        $data['url_current']    = Request::path();
        //var_dump($data['user']);
        $users = User::getAll();
        if ($users)
            $data['userslist'] = $users;
        
		return View::make('admin.userlist',$data);
    }

    public function newUser(){

        $data['url_current']    = Request::path();

        return View::make('admin.user',$data);   
    }

    public function insert(){

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

    public function editUser ($id) {

        if ( isset($id) && $id > 0 ){

            $data['url_current']    = Request::path();

            $userData = User::getUserById($id);
            if ($userData)
                $data['userData'] = $userData;
            else
                return Redirect::to(url('admin/usuarios'))->with('message', showAlerts('error',Config::get('messages.user.error.notfound')));

            return View::make('admin.user',$data);

        }else{

            return Redirect::to(url('admin/usuarios'))->with('message', showAlerts('error',Config::get('messages.user.error.not-identified')));
        }


    }

    public function update ($id){

        if (isset($id) ) {
            var_dump($_POST);
            $returnUser = User::updateUser($id,$_POST);
            if ($returnUser)
                return Redirect::to(url('admin/usuarios'))->with('message', showAlerts('success',Config::get('messages.user.success.form-update')));
            else 
                return Redirect::to(url('admin/usuarios'))->with('message', showAlerts('error',Config::get('messages.user.error.form-update')));    
        }else{
            return Redirect::to(url('admin/usuarios'))->with('message', showAlerts('error',Config::get('messages.user.error.form-update')));
        }


    }

}