@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Post | <a href="{{route('post.add')}}">New Record</a> </h3>

    <div class="container">

    <table class="table table-dark table-hover" style="border:2px solid blue;">
          
       <tr class="bg-primary text-white" style="border:1px solid red">
            <td>No.</td>
            <td>TITLE</td>
          
            <td>BODY</td>
         
            <td>PRIVACY</td>
            <td>ACTION</td>
      </tr>
      @php($no=0)
    @foreach($posts as $post)
    @php($no++)
    <tr>
      <td>{{$no}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td style="color: rgb(35, 160, 233)">{{$post->privacy}}</td>
       
  
        <td>
          <a  href="{{route('post.edit',['post'=>$post])}}" class="text-success" > Edit</a>
          <a href="{{route('post.delete',['post'=>$post])}}" class="text-danger"> Delete</a>
       </td>
	
		


    @endforeach
    
    </table>
  </div>
@endsection
   