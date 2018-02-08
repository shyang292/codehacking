@extends('layouts.admin')

@section('content')
    <h1>Comments</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Post</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)

            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td><a href="{{route('home.post', ['id'=>$comment->post_id])}}">View Post</a></td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method' => 'PUT', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}
                        @if($comment->is_active == 0)
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
                            </div>
                        @else
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Unapprove', ['class'=>'btn btn-info']) !!}
                            </div>
                        @endif
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach

        @endif
        </tbody>
    </table>
@stop