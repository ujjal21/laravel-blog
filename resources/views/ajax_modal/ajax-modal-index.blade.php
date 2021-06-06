<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 Crud operation using ajax(Real Programmer)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>



<div class="container">
    <h1>Laravel 6 Crud with Ajax</h1>
    <span class="success" style="color:rgb(51, 223, 88); margin-top:10px; margin-bottom: 10px;"></span>
    <span class="error" style="color:rgb(253, 6, 6); margin-top:10px; margin-bottom: 10px;"></span>
  
    <a class="btn btn-success" href="javascript:void(0)" id="createNewBook"> Create New Book.</a>
    <table class="table table-bordered data-table">                           {{-- class=data-table --}}  
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Author</th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)

<tr id='table'>

       <td> {{$blog->id}}</td>
       <td> {{$blog->title}}</td>
      <td> {{$blog->body}} </td> 



    <td>
        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{$blog->id}}" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>

         <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{$blog->id}}" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>
         <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{$blog->id}}" data-original-title="Show" class="btn btn-success btn-sm showBook">Show</a>

{{--            
      <a  href="{{route('ajax.show',['blog'=>$blog])}}">Show  </a>
      <a href="{{route('ajax.edit',['blog'=>$blog])}}">Edit</a>
      <a id="delete" href="{{route('ajax.delete',['blog'=>$blog])}} ">Delete</a>
      <a href="{{route('ajax.delete',['blog'=>$blog])}}" data-toggle="tooltip"  data-id="{{$blog->id}}" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>
      --}}
    </td>
     
    </tr>
     @endforeach
        </tbody>
    </table>
</div>

{{-- start modal --}}

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
                

            </div>
            <div class="modal-body">
{{-- start form --}}
                <form id="bookForm" name="bookForm" class="form-horizontal">
                    
                   <input type="text" name="book_id" id="book_id">

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                            <h4 class="form-control" id="title_show"></h4>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <textarea id="body" name="body" required="" placeholder="Enter Author" class="form-control"></textarea>
                            <h4 class="form-control" id="body_show"></h4>
                        
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes  </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
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

    // var table = $('.data-table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('modal.index') }}",
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //         {data: 'title', name: 'title'},
    //         {data: 'author', name: 'body'},
    //         {data: 'action', name: 'action', orderable: false, searchable: false},
    //     ]
    // });

    $('#createNewBook').click(function () {
        $('#saveBtn').val("create-book");           //form button id.
        $('#saveBtn').html("create-new-book");      //form button id.
        $('#book_id').val('');                      //form hidden book_id.
        $('#bookForm').trigger("reset");            //
        $('#modelHeading').html("Create New Book"); //modal title.
        $('#ajaxModel').modal('show');              //modal id.

       $('#title_show').hide();
        $('#body_show').hide();

        $('#title').show();              
        $('#body').show();             
        $('#saveBtn').show(); 

    });

    $('body').on('click', '.editBook', function () {
      var book_id = $(this).data('id');
      $.get("{{ route('modal.index') }}" +'/' + book_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Book");
          $('#saveBtn').val("edit-book");
          $('#ajaxModel').modal('show');
          $('#book_id').val(data.id);
          $('#title').val(data.title);
          $('#body').val(data.body);

          $('#title_show').hide();
          $('#body_show').hide();

          $('#title').show();              
          $('#body').show();
         $('#saveBtn').show(); 

      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');

        $.ajax({
          data: $('#bookForm').serialize(),
          url: "{{ route('modal.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#bookForm').trigger("reset");
              $('#ajaxModel').modal('hide');
            //  table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    //show
    $('body').on('click', '.showBook', function () {
      var book_id = $(this).data('id');
      $.get("{{ route('modal.index') }}" +'/' + book_id, function (data) {

          $('#ajaxModel').modal('show');
          $('#modelHeading').html("Your Data Is Here");
         // $('#saveBtn').val("edit-book");
          $('#saveBtn').hide();
          $('#title_show').html(data.title);
          $('#body_show').html(data.body);

        //  $('#book_id').val(data.id);
         // $('#book_id').val(data.id);
         // $('#title ').val(data.title);
          $('#body').val(data.body);
          $('#book_id').hide();
          $('#title').hide();
          $('#body').hide();

          $('#title_show').show();
          $('#body_show').show();
         $('#saveBtn').val("edit-book");

      })
   });


    //delete

    $('body').on('click', '.deleteBook', function () {

        var book_id = $(this).data("id");
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('modal.store') }}"+'/'+book_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

  });
</script>
</body>
</html>
