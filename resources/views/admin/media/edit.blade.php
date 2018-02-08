@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <img height="50" src="{{$photo->path}}">
        </div>
        <div class="col-sm-9">
            {!! Form::model($photo, ['method' => 'PUT', 'action'=> ['PhotosController@update', $photo->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::file('file', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">

                {!! Form::submit('Edit photo', ['class'=>'btn btn-primary col-sm-3']) !!}

            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'Delete', 'action'=> ['PhotosController@destroy', $photo->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete photo', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>

@stop