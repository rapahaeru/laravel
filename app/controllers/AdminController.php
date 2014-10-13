<?php 

class AdminController extends BaseController {

    public function index(){

        if (Session::has('user')){

            return Redirect::to(url('/admin/painel'));

        }else{
            return View::make('admin.login');
        }
        

    }

}