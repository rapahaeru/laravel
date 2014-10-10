<?php 

class AdminController extends BaseController {

    public function index(){
        //CONFERE SESSOES
        //

        if (Session::has('user')){
            echo "entrou";
            var_dump(Session::all());

            return View::make('admin.home');
        }else{
            return View::make('admin.login');
        }
        

    }

    // public function change_language(){
    // 	$lang = Session::get('language');
    // 	if($lang == "en"){
    // 		Session::put("language", "pt");
    // 	} else {
    // 		Session::put("language", "en");
    // 	}
    // 	return Redirect::back()->with('message', 'Idioma alterado com sucesso.');
    // }

}