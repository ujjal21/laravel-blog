@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> Post | <a href="{{route('posts.create')}}">New Record</a>|<a href="{{('login')}}">Login</a> </h3>
    <table style="border:2px solid blue;">
          
       <tr style="border:1px solid red">
            <td>NAME</td>
            <td>EMAIL</td>
          
            <td>PASSWORD</td>
         
            <td>ACTION</td>
      </tr>
    
    @foreach($data as $row)
    <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->password}}</td>
       
        <td>
          <a href="{{route('posts.show',$row->id)}}">Show</a>
          <!-- <a href="{{route('posts.edit',$row->id)}}">Edit</a>  -->
		   
		</td>
		
		
			<td>
           <form action="{{route('posts.edit',$row->id)}}" method="get" onsubmit="return confirm('are you sure?')">
            @csrf
            @method('edit')
            <button type="submit"> edit </button>
           </form>
			</td>
		
		
			<td>
           <form action="{{route('posts.destroy',$row->id)}}" method="POST" onsubmit="return confirm('are you sure?')">
            @csrf
            @method('delete')
            <button type="submit"> delete </button>
           </form>
			</td>
        
    </tr>

    @endforeach
    
    </table>
@endsection
   