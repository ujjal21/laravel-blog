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
    <div class="container">
        <h1>Laravel Ajax Post Request Example with../<a  href="{{route('ajax.index')}}"> TABLE.</a> </h1>  

          <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
          <span class="error" style="color:rgb(253, 6, 6); margin-top:10px; margin-bottom: 10px;"></span>
      
          <form id="ajaxform">
           
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title"  id="title">
                <span class="text-danger" id="title-error"></span>
              </div>

            <div class="form-group">
                <label>Body:</label>
                <input type="text" name="body" class="form-control" placeholder="Enter Body"  id="body">
                <span class="text-danger" id="body-error"></span>

              </div>


           
            <div class="form-group">
                <button class="btn btn-success save-data"  id="submit">Save</button>
            </div>
            
        </form>
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
    
    
    
    
          //  $(".save-data").click(function(event){              //button->class
            $('#ajaxform').on('submit', function(event){          //form ->id      
          //  $("#submit").click(function(event){                 //button->id
                event.preventDefault();                                        //show error message and prevent reset.
                $confirm = confirm("Are You sure want to ADD !");
                if($confirm == true ){

            $('#title-error').text('');
            $('#body-error').text('');
          
    
            title = $('#title').val();                        // Get Data Into Variable.
            body = $('#body').val();
           
    
    
                 $.ajax({
                  url: "/ajax-request",
                  type:"POST",
                  data:{
                    title:title,                        //controller->request:[title = $('#title').val()]
                    body:body,
                  
    
                  },
                  success:function(response){
                    console.log(response);
                    if(response) {
                      $('.success').text(response.success);
                      $("#ajaxform")[0].reset();
                    }
                  },
    
                  error: function(response) {                          // show error massage of input field.
                   $('#title-error').text(response.responseJSON.errors.title);
                  $('#body-error').text(response.responseJSON.errors.email);
                
              }
    
                 });
                }
            });
    
    });
          </script>
      
</body>
</html>