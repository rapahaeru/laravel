<?php 

class AuthController extends BaseController {

    public function login(){
        //$form = new LoginForm;

        return View::make('admin.login');

    }

    public function do_login(){

        $pass =  Hash::make($_POST['password']);

        //echo $pass;
        //$users = User::getAll();

        $users = User::getUserByMail($_POST['email']);

        if ($users){
            foreach ($users as $user ) {
                echo $user->usr_pass;    
            }
        }


        


        if ( hash::check($_POST['password'],$pass)){
            //echo "checado";
        }else{
            //echo "erro";
        }

        










        // $form = new LoginForm;
        // $form->fill(Input::all());

        // if($form->is_valid()){
        //     $data = $form->data();
        //     $login = ["username" => $data["username"], "password" => $data["password"]];
        //     if(Auth::attempt($login)){
        //         // Session::put('language', $data['language']);
        //         if(Session::has('next')){
        //             $next = Session::get('next');
        //             Session::forget('next');
        //             return Redirect::to($next);
        //         }
        //         return Redirect::to("/admin");
        //     }
        // }
        
        // return Redirect::back()->withErrors(["Usuário e/ou senha inválidos"]);
    }

    public function logout(){
        Session::flush();
        return Redirect::to(url('/admin'));
    }

}