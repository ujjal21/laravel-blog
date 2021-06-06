@extends('layouts.admin')
@section('title', 'View Profession') 
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
      @foreach($posts as $post)
                       <p><b>{{ $post->title }}</b></p>
                         <p>
                          {{ $post->body }}
                         </p>
                      
     @endforeach
    </h1>
    
    
     
    

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
