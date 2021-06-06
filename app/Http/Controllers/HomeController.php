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

    public function postlogin(Request $request)
    {
       $credentials=$request->only('email','password');

         if(Auth::attempt($credentials)){

                                // return redirect()->intended('');
                                // return  redirect()->route('post.posts');

         if(Auth::User()->adnin == 'admin') {
            return  redirect()->route('admin.admin');
         }
         
         if(Auth::User()->adnin == 'guest') {
            return  redirect()->route('guest.poco'); 
                   }else

                   return  redirect()->route('post.posts');

       }else{

       
        //return  redirect()->route('post.posts');
        //return  redirect()->route('home');
        return  redirect()->route('login');
    }
    }

    public function logout(){

        Auth::logout();
        return  redirect()->route('post.posts');
    }

    public function admin(){
        return view('admin.posts.admin');
    }
    public function users(){

        $users = User::paginate(10);
        return view('admin.posts.usertable',['users'=>$users]);
    }


    public function page()
    {
        return view('admin.posts.page');
    }
    public function poco()
    {
        return view('guest.poco');
    }

}
