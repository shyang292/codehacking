@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>Categories</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>


@stop