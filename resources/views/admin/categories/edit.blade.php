@extends('layouts.admin')

@section('content')
    {!! Form::model($category, ['method' => 'PUT', 'action'=> ['CategoriesController@update', $category->id]]) !!}
        <div class="form-group">

            {!! Form::label('name', 'Category Name:') !!}

            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group ">
            {!! Form::submit('Edit Category', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

    {!! Form::close() !!}
    <div class="form-group ">
        {!! Form::open(['method' => 'Delete', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}

            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}

        {!! Form::close() !!}
    </div>

@stop
