<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Post Request Example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
<h3> Post/show record </h3>
<a  href="{{route('ajax.create')}}"> Create New Book.</a>

<div>
  <span class="success" style="color:rgb(51, 223, 88); margin-top:10px; margin-bottom: 10px;"></span>

  <table class="table table-hover table-dark" id='table'>
    <thead>
  
      <tr>
        <th scope="col">ID</th>
        <th scope="col">TITLE</th>
        <th scope="col">BODY</th>
       
       
      </tr>
    </thead>
    <tbody>


@foreach ($blogs as $blog)

<tr id='table'>

       <td> {{$blog->id}}</td>
       <td> {{$blog->title}}</td>
      <td> {{$blog->body}} </td> 



    <td>
            
      <a  href="{{route('ajax.show',['blog'=>$blog])}}">Show  </a>
      <a href="{{route('ajax.edit',['blog'=>$blog])}}">Edit</a>
      <a id="delete" href="{{route('ajax.delete',['blog'=>$blog])}} ">Delete</a>
      <a href="{{route('ajax.delete',['blog'=>$blog])}}" data-toggle="tooltip"  data-id="{{$blog->id}}" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>
     
    </td>
     
    </tr>
     @endforeach
    </table>

  </div>

  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
 
 <script type="text/javascript">
 
     $(function () {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
         });
     
     
         $('body').on('click', '.deleteBook', function (e) {
          e.preventDefault();
        var book_id = $(this).data("id");
          $confirm = confirm("Are You sure want to delete !");
         if($confirm == true ){
           $.ajax({
            type: "POST",
         url: "{{ route('ajax.index') }}"+'/'+book_id,
          
          success: function (response) {
            console.log(response);
                if(response) {
                  $("#table").trigger("reset"); 
                  $('.success').text(response.success);
                  
                  
                }
             // table.draw();
                  //

          },
          error: function (response) {
              console.log('Error:', response);
          }
      });
  }
  });
      
      });
           </script>
</body>
</html>