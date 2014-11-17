<?php


class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */

    public function emailExist (){

        //var_dump($_POST);

        if ($_POST['template'] == "edit"){
           

            $returnCurrentMail = User::isMailFree($_POST['inputmail']);
            if (!$returnCurrentMail){
                    //$verifyMail =  User::getUserByMail($_POST['currentmail']);
                    if ($_POST['inputmail'] == $_POST['currentmail'])
                        $isAvailable = true;
                    else
                        $isAvailable = false;
            }else{
                $isAvailable = true;
            }    

        }else{

            $returnMail = User::getUserByMail($_POST['inputmail']);
            if ($returnMail)
                $isAvailable = false;
            else
                $isAvailable = true;

        }

        echo json_encode(array('valid' => $isAvailable));
    }

    public function showUsers()
    {

        $data['url_current']    = Request::path();

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