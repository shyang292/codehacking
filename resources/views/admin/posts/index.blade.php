@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>Posts</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>View Post</th>
            <th>View Comment</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{$post->photo?$post->photo->path:'/images/placeholder.jpg'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category?$post->category->name:'uncategoried'}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a href="{{route('home.post', $post->slug)}}">View Post</a>
                    </td>
                    <td>
                        <a href="{{route('admin.comments.show', $post->id)}}">View Comment</a>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>


@stop