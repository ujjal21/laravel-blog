@extends('template')

@section('title')
    post
 @endsection

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="px-3 py-5 bg-gradient-primary text-white">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="px-3 py-5 bg-gradient-primary text-white">
                                                        <form action="{{route('login')}}" method="POST">
                                                    @csrf
                                                    
                                                    <p>EMAIL</p>
                                                    <input type="text" name="email" class="form-control form-control-user">


                                                    <p>PASSWORD</p>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="exampleInputPassword" name="password" placeholder="Password">
                                                    </div>
                                                

                                                    <button type="submit" class="btn btn-primary btn-user btn-block"> Login</button>
                                                
                                                    <hr>
                                                
                                                </div>       </form> 
                                                <div class="text-center">
                                                    <a class="small" href="{{route('signup')}}">Create an Account!</a>
                                                </div>

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
   