<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            return redirect('dashboard');
        }
        return redirect('auth/login')->with('failure', 'you can not login');
    }

    //To load person's feed data
    function dashboard(){
        if(Auth::check()){
            return view('dashboard');
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
