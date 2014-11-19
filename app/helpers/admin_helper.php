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


function display_filesize($filesize){
    
    if(is_numeric($filesize)){
    $decr = 1024; $step = 0;
    $prefix = array('Byte','KB','MB','GB','TB','PB');
        
    while(($filesize / $decr) > 0.9){
        $filesize = $filesize / $decr;
        $step++;
    } 
    return round($filesize,2).' '.$prefix[$step];
    } else {

    return 'NaN';
    }
    
}