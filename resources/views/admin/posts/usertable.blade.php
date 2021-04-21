@extends('template')

@section('title')
    post
 @endsection

@section('content')
<h3> Record All the Users.. </h3>
<div class="container">

 <table class="table table-dark table-hover" style="border:2px solid rgb(233, 10, 10); ">
              
    <tr class="bg-primary text-white" style="border:1px solid red ; color: rgb(35, 160, 233)">
    <th>NO</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>PASSWORD</th>
    <th>ADMIN</th>
</tr>

    
    @php($no=0)
    @foreach ($users as $user)
    @php($no++)
        
    <tr>
        <td>{{$no}}</td>
        <td> {{$user->name}} <br> </td>
        <td>  {{$user->email}} <br> </td>
        <td> {{$user->password}} <br> </td>
        <td style="color: rgb(35, 160, 233)">{{$user->adnin}} <br> </td>
    </tr>
       
       
        @endforeach
</div>
    
    </table>
    {{$users->links()}}
  
@endsection

   