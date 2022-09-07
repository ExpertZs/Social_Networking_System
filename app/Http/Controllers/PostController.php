<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\Post;
use App\Models\PagePost;
use App\Models\FollowPerson;
use App\Models\FollowPage;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{ 
    //To integrade api/person/attach-post here to load post creation form
    function create_post(){
        return view('dashboard');
    }

 
    //To integrade api/person/attach-post here to validate and store post creation form data into database
    function post_creation(Request $request){
        $user_id=Auth::user()->id;
        //checking that person is whether valid user or not
        if($user_id== 'null'){
            return redirect('person/feed')->with('failure', 'Please login first to create any post');
        }
        else{
            $data= $request->all();
         Post::create([     
            'content' => $data['content'],
            'creater_id' => $user_id,
        ]);
        return redirect('person/feed')->with('success', 'Post creation success');
        }     
    }

    //To integrade api/page/{pageId}/attach-post here to load page post creation form
    
    function create_page_post($pageId){
        $page['page']=Page::where('id',$pageId)->first();
        return view('page/page', $page);
    }

 
    //To integrade api/page/{pageId}/attach-post here to validate and store page post creation form data into database
    function page_post_creation(Request $request, $id){
        $user_id=Auth::user()->id;
        //checking that person is whether valid user or not
        if($user_id== 'null'){
            return redirect('person/feed')->with('failure', 'Please login first to create any post');
        }
        else{
            $data= $request->all();
         PagePost::create([     
            'content' => $data['content'],
            'page_id' => $id,
            'creater_id' => $user_id,
        ]);
        return redirect('person/feed')->with('success', 'Post creation in page success');
        }     
    }
}
