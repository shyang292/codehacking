@extends('layouts.admin')

@section('content')
    <h1>Create Category</h1>
    <div class="row">
        {!! Form::open(['method' => 'POST', 'action'=> 'CategoriesController@store', 'files'=>true]) !!}
        <div class="form-group">

            {!! Form::label('name', 'Category Name:') !!}

            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row">
        @include('includes.form_error')
        @stop
    </div>