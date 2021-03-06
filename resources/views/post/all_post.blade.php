@extends('template')

@section('title')
    post
 @endsection {{-- Always maintain allignment --}}

@section('content')
  <h3> Post |
            @if(auth()->user())
            
            <a href="{{route('post.add')}}">New Record</a> 
            
            @else
            <a href="{{route('login')}}">LOGIN</a>
            @endif
            
           </h3>
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
    <tr> {{--  Where does it end? --}}
        <td>{{$no}}</td> {{-- Always maintain allignment --}}
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td style="color: rgb(35, 160, 233)">{{$post->privacy}}</td>
    
  
        <td>
           @if (auth()->user() && auth()->user()->id == $post->user_id) {{--  for user --}}
             <a  href="{{route('post.edit',['post'=>$post])}}" class="text-success" > Edit</a>
             <a href="{{route('post.delete',['post'=>$post])}}" class="text-danger"> Delete</a> 
            
            
              @elseif  (auth()->user() && auth()->user()->adnin == 'admin') {{--  for admin --}}
              <a  href="{{route('post.edit',['post'=>$post])}}" class="text-success" > Edit</a>
              <a href="{{route('post.delete',['post'=>$post])}}" class="text-danger"> Delete</a>  
         
           @endif
          
       </td>
	
      </tr> 
             
     
   

    @endforeach
    
    </table>
  </div>
  {{$posts->links()}}
 
@endsection
   