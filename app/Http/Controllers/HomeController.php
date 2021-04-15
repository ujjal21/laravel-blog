<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class HomeController extends Controller
{
    //

    public function signup(){
        return view('admin.posts.signup');
    }
    public function register(Request $request){

        validator::make($request->all(),[
            'name'=>'required|min:5|max:10',
            'email'=>'required|unique:users',
            'password'=>'required'
        ])->validate();

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success','Data insert successfull');
    }

    public function login(){
        return view('admin.posts.login');
    }
    
    public function home()
    {
        return view('admin.posts.home');
    }

    public function postlogin(Request $req){
       $a=$req->only('email','password');

       if(Auth::attempt($a)){

        return redirect()->intended('');

       }else{

       
        
        return  redirect()->route('home');
    }}

    public function logout(){

        Auth::logout();
        return  redirect()->route('login');
    }
}
