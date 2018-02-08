@extends('layouts.admin')

@section('content')
    <h1>All Media</h1>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Path</th>
            <th>Create_at</th>
            <th>Update_at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>
                        <a href="{{route('admin.photos.edit', $photo->id)}}">
                            <img height="50" src="{{substr($photo->path, strrpos($photo->path, '/') + 1)?$photo->path:'http://placehold.it/400X400'}}">
                        </a>
                    </td>
                    <td>{{$photo->path}}</td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>{{$photo->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method' => 'Delete', 'action'=> ['PhotosController@destroy', $photo->id], 'files'=>true]) !!}
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