@extends('layout')

@section('title')
   home
 @endsection

@section('content')
<div>
  <table class="table table-hover table-dark">
    <thead>
  
        <tr>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PH NUMBER</th>
            <th scope="col">MASSAGE</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>

    


<tr>

  <td> {{$blog->id}} </td> 
  <td> {{$blog->title}} </td> 
  <td> {{$blog->body}} </td> 

  <td> {{$blog->mobile_number}}</td>
 
 <td> {{$blog->message}} </td> 
 <td> <a  href="{{route('ajax.index')}}">Back  </a>
 </td>

     
    </tr>
    </table>

  </div>
@endsection

