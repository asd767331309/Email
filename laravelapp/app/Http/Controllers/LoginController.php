<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users as Users;

class LoginController extends Controller
{
    //
 	public function login(){
        if(!isset($_SESSION)){
            session_start();
        }
 		return view('login.index');
 	}

 	public function loginProcess(Request $request)
    {
        //open the session
        if(!isset($_SESSION)){
            session_start();
        }
 		$username = $request->get('username');
 		$password = $request->get('password');

        if(isset($_POST['register']))
        {
            $users = new Users();
            $users->Username = $username;
            $users->Password = password_hash($password, PASSWORD_DEFAULT);
            $users->save();
            $request->session()->set('username', $username);
            return view('home.index');
        }
        else
        {
            $checkuser = Users::selectRaw("Count(*) as Total")->where("Username", "=", $username)->first();

            if (intval($checkuser->Total) > 0) {
                //This is the correct one
                $getpassword = Users::select("Password")->where("Username", "=", $username)->first();
                if (password_verify($password, $getpassword->Password)) {
                    //$request->session()->set('username', $username);
                    $_SESSION['username'] = $username;
                    return redirect('home');
                } else {
                    return redirect('login');
                }
            } else {
                return redirect('login');
            }
        }
 	}

 	public function logout(){
 		//$request->session()->flush();
        if(!isset($_SESSION)){
            session_start();
        }
        //var_dump($_SESSION);
        session_unset('username');
        //var_dump($_SESSION);
 		return redirect('login');
 	}
}
