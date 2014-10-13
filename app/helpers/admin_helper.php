<?php

function verifySession ($par,$url){

    if (Session::has($par)){
        return Session::all();
    }else{
    	return Redirect::to(url($url));
    }

}