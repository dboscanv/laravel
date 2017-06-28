@extends('layouts.master')
@section('content')
    <div class="col-sm-8 blog-main">
    @include('posts.post')

    <!-- Comentarios -->
        <div class="comments">
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}:
                        </strong>
                        {{$comment->body}}
                    </li>
                @endforeach
            </ul>
        </div>
        <hr>
        <!-- Add a comment -->
        <div class="card">
            @include('layouts.errors')
            <div class="card-block">
                <form method="POST" action="/posts/{{$post->id}}}/comments">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" placeholder="Tu opinion acerca de esto" class="form-control" cols="30"
                                  rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection