@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Post/Edit record </h3>


    <form action="{{route('posts.update',$data->id)}}" method="POST">
   @csrf
   @method('PUT')
   <p>NAME</p>
   <input type="text" name="name" value="{{$data->name}}">
   
   <p>EMAIL</p>
   <input type="text" name="email" value="{{$data->email}}">
   <p>PASSWORD</p>
   <input type="text" name="password" value="{{$data->password}}">
    <button type="submit"> Update</button>
    <a href="{{route('posts.index')}}">Back</a>
 
   </form> 




@endsection
   