<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\Post;
use App\Models\PagePost;
use App\Models\FollowPerson;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    //To integrade api/follow/person/{personId} here to load person whom you would like to follow   
    function search_follow_person($personId){
        $person['person']=User::where('id', $personId)->first();
        return view('follow/person', $person);
    }

 
    //To integrade api/follow/person/{personId} here to validate and store follow a person data into database
    function follow_person(Request $request, $id){
        $user_id=Auth::user()->id;
        //checking that person is whether valid user or not
        if($user_id== 'null'){
            return redirect('dashboard')->with('failure', 'Please login first to create any post');
        }
        //checking that person is whether valid user or not
        else if($user_id== $id){
            return redirect('dashboard')->with('failure', 'You can not follow yourself');
        }

        else{
            $data= $request->all();
         FollowPerson::create([     
            'person_id' => $id,
            'follower_id' => $user_id,
        ]);
        return redirect('dashboard')->with('success', 'you successfully followed');
        }     
    }
}
