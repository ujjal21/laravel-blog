@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Post/show record </h3>
    <p>
        NAME:{{$data->name}} <br>
        EMAIL:{{$data->email}} <br>
        PASSWORD:{{$data->password}} <br>
       
    
    
    </p>

    <a href="http://127.0.0.1:8000/admin/posts">Back</a>
  
@endsection

   