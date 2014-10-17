<?php 

class AuthController extends BaseController {

    public function login(){
        //$form = new LoginForm;
        //$data['user']           = verifySession('user','/login'); //admin_helper
        $data['url_current']    = Request::path();
        return View::make('admin.login',$data);

    }

    public function do_login(){

       // $pass =  Hash::make($_POST['password']);

        $users = User::getUserByMail($_POST['email']);

        if ($users){
            foreach ($users as $user ) {
                $pass       = $user->usr_pass;
                $id         = $user->usr_id;
                $name       = $user->usr_name;
                $level      = $user->usr_level;
            }

           if ( Hash::check($_POST['password'],$pass)){
                // GRAVA AS SESSOES
                Session::put('user.id',$id);
                Session::put('user.name',$name);
                Session::put('user.level',$level);

                return Redirect::to(url('/admin'));
                //$retorno = 'senha validada';
            }else{
                return Redirect::back()->with("message",showAlerts('error',Config::get('messages.login.error.pass') ));
                //
            }            
        }else{

            return Redirect::back()->with("message",showAlerts('error',Config::get('messages.login.error.mail') ));
            //

        }

    }

    public function logout(){
        Session::flush();
        //Auth::logout();
        return Redirect::to(url('/login'));
    }

}