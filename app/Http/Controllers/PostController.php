<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

use Validator,Redirect,Response;

use Illuminate\Support\Facades\Hash;

//use App\ujjal;
use Illuminate\support\str;


class PostController extends Controller
{
   
   
      public function add()
      {
         return view('post.create_post');
      } 

      public function save(Request $request)
      {
         
        validator::make($request->all(),[
         'privacy'=>'required',
         'title'=>'required',
         'body'=>'required'
     ])->validate();

     Post::create([
         'user_id'=>Auth::User()->id,
         'privacy'=>$request->privacy,
         'title'=>$request->title,
         'body'=>$request->body
     ]);
     return redirect()->route('post.add')->with('success','Data insert successfull');
      } 

      public function posts()
      {

       // $posts = Post::where('privacy','=','login') 

            if(!Auth::user())
            {
               $posts = Post::where('privacy','=','public')
                             ->get();
                return view('post.all_post',['posts' => $posts]);

            }else{

               $posts = Post::where('user_id',Auth::User()->id)
                              ->orwhere('privacy','=','login') 
                              ->orwhere('privacy','=','public') 
                              ->get();
                return view('post.all_post',['posts' => $posts]);


            }






        
      }

}


