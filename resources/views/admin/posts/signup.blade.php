@extends('template')

@section('title')
    post
 @endsection

@section('content')

    <h3> Signup | <a href="{{route('login')}}"> Login</a> </h3>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="px-3 py-5 bg-gradient-primary text-white">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                    @if(count($errors) > 0 )

                                    <ul>
                                    @foreach($errors->all() as $error)
                                    <li style="color:rgb(9, 255, 103)";>{{$error}}</li>
                                    @endforeach
                                    
                                    </ul>
                                    @endif
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="px-3 py-5 bg-gradient-primary text-white">


    <form action="{{route('signup')}}" method="POST">
   @csrf
  
   <p>NAME</p>
   <input type="text" name="name"  class="form-control form-control-user">

   <p>EMAIL</p>
   <input type="text" name="email"  class="form-control form-control-user">

   <p>PASSWORD</p>
   <input type="text" name="password"  class="form-control form-control-user">

                                               
   <hr>


    <button type="submit" class="btn btn-primary btn-user btn-block"> submit</button>
 
   </form> 
</div>       </form> 

</div>
</div>
</div>
</div>
</div>
</div>

</div>

</div>

</div>


@endsection
   