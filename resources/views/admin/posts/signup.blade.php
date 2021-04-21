@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Signup | <a href="{{route('login')}}"> Login</a> </h3>



    <form action="{{route('signup')}}" method="POST">
   @csrf
  
   <p>NAME</p>
   <input type="text" name="name">

   <p>EMAIL</p>
   <input type="text" name="email">

   <p>PASSWORD</p>
   <input type="text" name="password">




    <button type="submit"> submit</button>
 
   </form> 
@endsection
   