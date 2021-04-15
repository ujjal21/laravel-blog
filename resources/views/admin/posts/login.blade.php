@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Login </h3>


    <form action="{{route('login')}}" method="POST">
   @csrf
  
   <p>EMAIL</p>
   <input type="text" name="email">


   <p>PASSWORD</p>
   <input type="text" name="password">




    <button type="submit"> submit</button>
    <a href="http://127.0.0.1:8000/admin/posts">Back</a>
 
   </form> 
@endsection
   