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


        $posts = Post::where('privacy','=','public'); // Public post is visible to everyone, no need to add condition for it

        if(Auth::user())
        {
                    if(Auth::user()->adnin == 'admin')
                    {
                        $posts = Post::where('privacy','=','private')
                                    ->orwhere('privacy','=','login')
                                    ->orwhere('privacy','=','public');
            
                    }else{ 

                    $posts = Post::where('user_id',Auth::User()->id)
                            ->orwhere('privacy','=','login')
                            ->orwhere('privacy','=','public');

        }}
      

        //$posts = $posts->get(); // Get the posts
        $posts = $posts->paginate(10); // Get the posts


        return view('post.all_post',['posts' => $posts]);

        
      }
      public function edit(Post $post)
      {
        
        return view('post.edit',['post'=>$post]);
      }

      
      public function update(Request $request,Post $post)
      {
          
        validator::make($request->all(),[
            'privacy'=>'required',
            'title'=>'required',
            'body'=>'required'
                 ])->validate();

        $post->privacy = $request->privacy;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->back()->with('update','data update successfully');
        //return view('post.edit',['post'=>$post]);
      }

}


