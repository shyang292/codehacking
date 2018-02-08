@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo?$post->photo->path:'http://placehold.it/900X300'}}" alt="">

    <hr>

    <!-- Post Content -->
    <div class="well">
        <p class="lead" style="word-wrap: break-word">
            {{$post->body}}
        </p>
    </div>


    <hr>

    @if(Session::has('comment_message'))
        {{session('comment_message')}}
        @endif
    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['method' => 'POST', 'action'=> 'PostCommentsController@store', 'files'=>true]) !!}
            <div class="form-group">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <hr>

    <!-- Posted Comments -->
@if(Auth::check())
    @if($post->comments)
        @foreach($post->comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    {{--<img width='64' class="media-object" src="{{$comment->photo?$comment->photo:'http://placehold.it/64x64'}}" alt="">--}}
                    <img width="64" class="media-object" src="{{Auth::user()->gravatar}}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}

                    @if($comment->replies)
                    <!-- Nested Comment -->
                        @foreach($comment->replies as $reply)
                            <div class="nested-comment media">
                                        <a class="pull-left" href="#">
                                            <img height="64" class="media-object" src="{{$reply->photo?$reply->photo:'http://placehold.it/64x64'}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->author}}
                                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                            </h4>
                                            {{$reply->body}}
                                        </div>
                            </div>
                        @endforeach
                        <!-- End Nested Comment -->
                    @endif
                    <input id="replyBtn" class="btn btn-primary" type="button" name="reply" value="Reply">
                    <div class="replyDiv">
                        <!-- Submit a reply-->
                        {!! Form::open(['method' => 'POST', 'action'=> 'CommentRepliesController@store']) !!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            {{--{!! Form::label('body', 'Reply:') !!}--}}
                            {!! Form::text('body', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                        <!-- End submit a reply-->
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endif



@stop

@section('category')
    <h4>Blog Category</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @if($post->category)
                        <li><a href="#">{{$post->category->name}}</a>
                        </li>
                @endif
            </ul>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('#replyBtn').click(function(){
            $(this).next().slideToggle();
        });
    </script>
@stop