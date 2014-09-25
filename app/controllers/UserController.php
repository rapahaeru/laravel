<?php


class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function showProfile()
    {
        //$user = User::find($id);
        $users = User::all();
		return View::make('users')->with('users',$users);

        //return View::make('users', array('user' => $user));
    }

}