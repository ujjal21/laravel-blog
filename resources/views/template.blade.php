<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/css/bootstrap.min.css" />

      <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/datepicker3.css" rel="stylesheet">
          <link href="css/styles.css" rel="stylesheet">
          <script src="js/jquery-1.11.1.min.js"></script>


    <title>@yield('title')|Laravel6</title>

</head>

<body>

<header style="color: #082d4a;border: 3px solid black;background-color: #e8b2b2;">  <h1><center> HEAD...... </h1> </center> </header>


<center>  <nav> 
        <a href="">HTML1</a>
        <a href="">HTML2</a>
        <a href="">HTML3</a>
        <a href="">HTML4</a>
     </nav>
</center>

     <section style="height: 380px;">     
    <h5> ----------------Dynamic--------------- </h5>


    
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



 


    <footer style="color: #082d4a;border: 3px solid black;background-color: #e8b2b2;">   <h1><center> FOOTH......</center> </h1>  </footer>

<script src="/js/bootstrap.min.js"></script>

</body>
</html>