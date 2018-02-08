@extends('layouts.admin')

@section('content')
    <h1>Comment Replies</h1>

        <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                  <th>Image</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Action</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @if($replies)
                @foreach($replies as $reply)
                    <tr>
                        <td>{{$reply->id}}</td>
                        <td><img height="64" src="{{$reply->photo?$reply->photo:'http://placehold.it/64X64'}}"></td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{str_limit($reply->body, 15)}}</td>
                        <td>
                                {!! Form::open(['method' => 'PUT', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                                    @if($reply->is_active == 0)
                                        <input type="hidden" name="is_active" value="1">
                                        <div class="form-group">
                                            {!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
                                        </div>
                                    @else
                                        <input type="hidden" name="is_active" value="0">
                                        <div class="form-group">
                                            {!! Form::submit('UnApprove', ['class'=>'btn btn-info']) !!}
                                        </div>
                                    @endif
                                {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'action'=> ['CommentRepliesController@destroy', $reply->id]]) !!}
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