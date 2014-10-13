<?php 

class PainelController extends BaseController {

    public function index(){
        //require app_path().'/helpers/admin_helper.php';
        //echo Request::path(); // caminho funcional sem url do app
        //Request::url(); // caminho completo do app (HTTP)
        //$segment = Request::segment(1);

        $data['user']           = verifySession('user','/admin/login'); //admin_helper
        $data['url_current']    = Request::path();

        return View::make('admin.home',$data);


    }
}