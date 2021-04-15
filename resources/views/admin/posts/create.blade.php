@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Post/New record </h3>


    <form action="{{route('posts.store')}}" method="POST">
   @csrf
   <p>NAME</p>
   <input type="text" name="name">
   
   <p>EMAIL</p>
   <input type="text" name="email">


   <p>PASSWORD</p>
   <input type="text" name="password">




    <button type="submit"> submit</button>
    <a href="http://127.0.0.1:8000/admin/posts">Back</a>
 
   </form> 
@endsection
   