<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{    
    public function index()
    {
        return view('auth/login');
    }

    function registration(){
        return view('auth/register');
    }

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

    function login(){
        return view('auth/login');
    }

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

    function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('home')->with('failure', 'you are not loged in');
    }


    function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('auth/login');
    }
}
