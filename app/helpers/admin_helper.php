<?php

function verifySession ($par){

    if (Session::has($par)){
    	//echo "tem";
        return Session::all();
    }else{
    	return false;

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


