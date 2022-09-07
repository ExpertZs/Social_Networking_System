<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\Post;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{ 
    //To integrade api/page/create here to load page creation form
    function create_post(){
        return view('dashboard');
    }

 
    //To integrade api/page/create here to validate and store page creation form data into database
    function post_creation(Request $request){
        $user_id=Auth::user()->id;
        //checking that person is whether valid user or not
        if($user_id== 'null'){
            return redirect('dashboard')->with('failure', 'Please login first to create any post');
        }
        else{
            $data= $request->all();
         Post::create([     
            'content' => $data['content'],
            'creater_id' => $user_id,
        ]);
        return redirect('dashboard')->with('success', 'Post creation success');
        }     
    }
}
