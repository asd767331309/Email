<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post2 as Posts2;

class TextController extends Controller
{
    //
    public function submitted(Request $request){
        return var_dump($request);
    	$title = $request->get('title');
    	$body = $request->get('body');
    	$posts = new Posts2();
    	$posts->title = $title;
    	$posts->text = $body;
    	$posts->save();
    }

    public function post_list(){
    	$query = Posts2::select("*")->paginate(2);

    	$data = [
    		"posts" => $query
    	];

    	return view("post.list", $data);
    }
}
