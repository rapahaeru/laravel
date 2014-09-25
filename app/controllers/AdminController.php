<?php 

class AdminController extends BaseController {

    public function index(){
        return View::make('admin.home');
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