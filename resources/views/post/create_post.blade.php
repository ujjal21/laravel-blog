@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <h3> post </h3>


							
    <form role="form" method="post" action="{{ route('post.add') }}">
        @csrf
    
          
            
            <label>Create Post</label>
            <br>     <br>
           Privacy: <select name="privacy" >
               
                <option>select</option>   
                <option value="public">Public</option>   
                <option value="login">Login</option>
                <option value="private">Private</option>
               
            </select>
            <br>

            <input type="text" name="title" placeholder="title" > <br />
            <textarea name="body" id="body" cols="100" rows="8" placeholder="post"></textarea> <br />
                                        
            <button type="submit"  name="submit">Create Post</button>
        
    </form>

    
@endsection
   