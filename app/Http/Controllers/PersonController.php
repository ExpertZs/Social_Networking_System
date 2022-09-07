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

class PersonController extends Controller
{   
    //Initial page of the project 
    public function index()
    {
        return view('auth/login');
    }

    //To integrade api/auth/register api here to load registration form
    function registration(){
        return view('auth/register');
    }

    //To integrade api/auth/register here to validate and store registration form data into database
    function register(Request $request){
         $request->validate( [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

         $data= $request->all();

         User::create([     
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('home')->with('success', 'Registration complete now you can login');
    }

    //To integrade api/auth/login api here to load login form
    function login(){
        return view('auth/login');
    }

    //To integrade api/auth/login here to validate and redirect to login form data 
    function validate_login(Request $request){
        $request->validate([
            'email' => 'required', 
            'password' => 'required'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect('person/feed');
        }
        return redirect('auth/login')->with('failure', 'you can not login');
    }

    //To load person's feed data
    function dashboard(){
        //Checking where person logged in or not
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $post= Post::where('creater_id', $user_id)->get();
            $pagePost= PagePost::where('creater_id', $user_id)->get();    

            //Checking wheather the person is new or older on the site
            if($post=='null' && $pagePost=='null' ){   
            return view('home');
            }

            else{
                //Preparing the posts from himself and the person whom he follows    
                $followedPeople=FollowPerson::where('follower_id',$user_id)->get();
                    foreach($followedPeople as $data)
                    {
                        $followedPeopleId=$data->person_id;  
                        $post= Post::where('creater_id', $user_id)->orwhere('creater_id', $followedPeopleId)->get(); 
                        
                }
                $sendData['post']=$post; 

                //Preparing the posts from the pages where himself posts and he follows the pages
                $followedPage=FollowPage::where('follower_id',$user_id)->get();
                   foreach($followedPage as $data)
                    {
                        $followedPageId=$data->page_id; 
                        $pagePost= PagePost::where('creater_id', $user_id)->orwhere('page_id', $followedPageId)->get(); 

                    }

                    $sendData['pagePost']=$pagePost;  

                return view('dashboard',$sendData);
            }

            
        }

        return redirect('home')->with('failure', 'you are not loged in');
    }

    //To log out from current user
    function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('auth/login');
    }
}
