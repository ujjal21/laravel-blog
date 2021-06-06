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
        <h1>Laravel Ajax Post Request Example with <a href="https://codingdriver.com/">Coding Driver</a></h1>
          <span class="success" style="color:rgb(51, 223, 88); margin-top:10px; margin-bottom: 10px;"></span>
          <span class="error" style="color:rgb(253, 6, 6); margin-top:10px; margin-bottom: 10px;"></span>
        <form id="ajaxform">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title"  id="title" value="{{$blog->title}}"  >
                <span class="text-danger" id="title-error"></span>
              </div>

            <div class="form-group">
                <label>Body:</label>
                <input type="text" name="body" class="form-control" placeholder="Enter Body"  id="body"  value="{{$blog->body}}">
                <span class="text-danger" id="body-error"></span>

              </div>


            <div class="form-group">
                <button class="btn btn-success save-data"  id="submit">Update</button>
            </div>
        </form>

    </div>
    <td> <a  href="{{route('ajax.index')}}">Back  </a></td>

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
    
            $('#title-error').text('');
            $('#body-error').text('');

  
            title = $('#title').val();                        // Get Data Into Variable.
            body = $('#body').val();
      
    //    let _token   = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
              url: "{{route('ajax.update',['blog'=>$blog])}}",
              type:"POST",
              data:{
                title:title,
                body:body,
                
            //    _token: _token
              },
              success:function(response){
                console.log(response);
                if(response) {
                  $('.success').text(response.success);
                 // $("#ajaxform")[0].reset();
                }

              },

              error: function(response) {   
             //  $('.error').text(response.error);
                                       // show error massage of input field.
               $('#name-error').text(response.responseJSON.errors.title);
              $('#email-error').text(response.responseJSON.errors.body);
              $('#mobile-number-error').text(response.responseJSON.errors.mobile_number);
              $('#subject-error').text(response.responseJSON.errors.subject);
              $('#message-error').text(response.responseJSON.errors.message);
          }

             });
            }); 
              });
      </script>
      
</body>
</html>