@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <div class="row">
        {!! Form::open(['method' => 'POST', 'action'=> 'PostsController@store', 'files'=>true]) !!}
        <div class="form-group">

            {!! Form::label('title', 'Title:') !!}

            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">

            {!! Form::label('category_id', 'Category:') !!}

            {!! Form::select('category_id', [''=>'select one category']+$categories, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">

            {!! Form::label('photo_id', 'Photo:') !!}

            {!! Form::file('photo_id') !!}
        </div>
        <div class="form-group">

            {!! Form::label('body', 'Body:') !!}

            {!! Form::textarea('body', null,  ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">

            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row">
        @include('includes.form_error')
        @stop
    </div>