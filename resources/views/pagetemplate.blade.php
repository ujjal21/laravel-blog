<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/css/bootstrap.min.css" />

      <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/datepicker3.css" rel="stylesheet">
          <link href="css/styles.css" rel="stylesheet">
          <script src="js/jquery-1.11.1.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <title>@yield('title')|Laravel6</title>

</head>

<body>

<header>  <h1><center > HEAD...... @auth {{Auth::user()->name}} you are login @endauth</h1> </center> 


    <center>

        @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('logout') }}" class="btn btn-danger btn-icon-split"> LOGOUT</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('signup'))
                    <a href="{{ route('signup') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

       
    </center>
</header>
     <section>     


    
     @if(count($errors) > 0 )

    <ul>
       @foreach($errors->all() as $error)
       <li style="color:red";>{{$error}}</li>
       @endforeach
       
    </ul>
    @endif 


  
    @if (session('success'))
        <div class="alert alert-success"  style="color:green">
            {{ session('success') }}
        </div>
    @endif

    @if (session('update'))
        <div class="alert alert-success" style="color:green">
            {{ session('update') }}
        </div>
    @endif

    @if (session('delete'))
        <div class="alert alert-success" style="color:red">
            {{ session('delete') }}
        </div>
    @endif






 @yield('content')

 </section>



 

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
