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

class PageController extends Controller
{
    //To integrade api/page/create here to load page creation form
    function create_page(){
        return view('page/createpage');
    }

 
    //To integrade api/page/create here to validate and store page creation form data into database
    function page_creation(Request $request){
        $user_id=Auth::user()->id;
        //checking that person is whether valid user or not
        if($user_id== 'null'){
            return redirect('person/feed')->with('failure', 'Please login first to create any page');
        }
        else{
            $data= $request->all();
         Page::create([     
            'page_name' => $data['page_name'],
            'page_info' => $data['page_info'],
            'creater_id' => $user_id,
        ]);
        return redirect('person/feed')->with('success', 'Page creation success');
        }     
    }
}
