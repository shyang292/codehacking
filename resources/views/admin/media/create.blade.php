@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">
@stop

@section('content')
    <h1>Upload Photos</h1>
    <div class="row">
        {!! Form::open(['method' => 'POST', 'action'=> 'PhotosController@store', 'class'=>'dropzone']) !!}

        {{--<div class="form-group">--}}
            {{--{!! Form::file('file', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}

            {{--{!! Form::submit('Create photo', ['class'=>'btn btn-primary']) !!}--}}

        {{--</div>--}}

        {!! Form::close() !!}
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>

@stop


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
@stop