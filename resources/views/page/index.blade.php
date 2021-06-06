@extends('layout.admin')
@section('title', 'Professions') 
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
      Professions
      <a href="{{ route('admin_profession_create') }}" class="btn btn-primary float-right">Create profession</a>
    </h1>
    
    <form class="form-inline" action="{{ route('admin_profession_index') }}" method="GET">

      
      <div class="input-group mb-4 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Profession Title</div>
        </div>
        <input type="text" class="form-control mr-sm-2" id="profession_title" name="title" value={{ request('title', '') }}>
        <button type="submit" class="btn btn-primary mr-sm-2">Submit</button>
      </div>
    
     
    </form>

    <span class="alert alert-info mt-4">{{ $professions->total() }} results found</span>
    <table class="table table-striped mt-4">
      <thead class="thead-dark">
        <tr>
          <th>Id</th>
          <th>Profession</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($professions as $profession)
          <tr>
            <td>{{ $profession->id }}</td>
            <td>{{ $profession->title }}</td>
            <td>
              <a href="{{ route('admin_profession_view', ['profession' => $profession]) }}" class="btn btn-primary" title="View profession" >
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('admin_profession_edit', ['profession' => $profession]) }}" class="btn btn-primary" title="Edit profession">
                <i class="fas fa-pencil-alt"></i>
              </a>
              <button type="button" class="btn btn-danger delete_btn" data-href="{{ route('admin_profession_delete',['profession' => $profession])}}" data-index="{{ $loop->index }}">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        @empty
            <td>No profession is created</td>
        @endforelse
      </tbody>
    </table>
    
    {{ $professions->withQueryString()->links() }}

    @method('PUT')
     
    

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete profession</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure to delete this profession?</p>
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-danger" id="modal_delete_btn">Delete</button>
          </div>
        </div>
      </div>
    </div>
    
@endsection

@section('javascript')
    <script>
      jQuery(document).ready(function(){
        jQuery(".delete_btn").click(function(){
          jQuery("#modal_delete_btn")
            .attr('data-href', jQuery(this).attr('data-href'))
            .attr('data-index', jQuery(this).attr('data-index'))
            ;
          jQuery("#deleteModal").modal('show');
        });
        jQuery("#modal_delete_btn").click(function(){
          
          jQuery.ajax({
            url: jQuery(this).attr('data-href'),
            method:"DELETE",
            data:{
              _token: "{{ csrf_token() }}",
              _method: "DELETE"
            },
            beforeSend: function(){

            },
            success: function(){
              window.location.reload();
            }
          })
        });
      });
    </script>
@endsection