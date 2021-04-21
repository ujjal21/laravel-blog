@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Post/Edit record </h3>


    <form action="{{route('post.edit',['post'=>$post])}}" method="POST">
   @csrf
   <label>Create Post</label>
            <br>     <br>
           Privacy: <select name="privacy" value="{{ old('privacy', $post->privacy)}}" >
               
                <option  >select</option>   
                <option value="public">Public</option>   
                <option value="login">Login</option>
                <option value="private">Private</option>
               
            </select>
            <br>

            <input type="text" name="title" placeholder="title" value="{{ old('title', $post->title)}}" > <br />
            <textarea name="body" id="body" cols="100" rows="8" placeholder="post">{{ old('body', $post->body)}}</textarea> <br />
                                        
            <button type="submit"  name="submit">Update Post</button>
 
   </form> 




@endsection
   