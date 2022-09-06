<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    function create_page(){
        return view('page/createpage');
    }

 
    //To integrade api/auth/register here to validate and store registration form data into database
    
    function page_creation(Request $request){
        $user_id=Auth::user()->id;
        if($user_id== 'null'){
            return redirect('dashboard')->with('failure', 'Please login first to create any page');
        }
        else{
            $data= $request->all();
         Page::create([     
            'page_name' => $data['page_name'],
            'page_info' => $data['page_info'],
            'creater_id' => $user_id,
        ]);
        return redirect('dashboard')->with('success', 'Page creation success');
        }     
    }
}
