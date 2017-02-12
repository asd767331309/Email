<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users as Users;

class HelloController extends Controller
{
    //
    public function index(){
    	$data = [
    		'first_name' => "Henrio",
    		'last_name' => "Septiana"
    	];
    	return view('hello.index', $data);
    }

    public function home(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        if(isset($_POST['register']))
        {
            $users = new Users();
            $users->Username = $username;
            $users->Password = password_hash($password, PASSWORD_DEFAULT);
            $users->save();
        }
        else
        {

        }

        return view('home.index');
    }
}
