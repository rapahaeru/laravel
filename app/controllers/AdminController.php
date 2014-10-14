<?php 

class AdminController extends BaseController {

    public function index(){

        // $data['user']           = verifySession('user','/admin/login'); //admin_helper
        // $data['url_current']    = Request::path();
        if (Session::has('user')){

            return Redirect::to(url('/admin/painel'));

        }else{
            return View::make('admin.login');
        }
        

    }

}