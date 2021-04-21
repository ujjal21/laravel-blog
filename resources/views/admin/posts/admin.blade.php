@extends('template')

@section('title')
    post
 @endsection

@section('content')
   
    <p>
     <h1>This Is Admin Page</h1>
      <a href="{{route('admin.users')}}"> All The Users</a> <br>
      <a href="{{route('post.posts')}}"> All The post</a> 
    
    
    </p>

  
@endsection

   