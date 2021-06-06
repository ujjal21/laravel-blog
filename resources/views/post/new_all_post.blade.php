@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <hr />
                    @foreach($posts as $post)
                       <p><b>{{ $post->title }}</b> posted by...{{$post->user->name}}</p>
                         <p>
                          {{ $post->body }}
                         </p>
                      


  {{--
                    <h4>Display Comments</h4>
                    @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id]) 
                    <hr />


                    <h4>Add comment</h4>


                    {{-- <form method="post" action="{{ route('comment.add') }}">--}} 
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                             {{-- <input type="hidden" name="post_id" value="{{ $post->id }}" />--}} 
                            <input type="hidden" name="post_id" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form> 
                    <hr />
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
