<?php

function verifySession ($par,$url){

    if (Session::has($par)){
        return Session::all();
    }else{
    	return Redirect::to(url($url));
    }

}

function showAlerts($type,$message){

	if ($type == "error"){
		$return = "<div class='alert bg-danger'><p class='text-danger'>" . $message . "</p></div>";
	}elseif ($type == "success"){
		$return = "<div class='alert bg-success'><p class='text-success'>" . $message . "</p></div>";
	}
	return $return;
}