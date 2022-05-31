@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
    <h1>Post </h1>
    <div class="container"></div>
    @foreach ($posts as $post)
        <div class="row ">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary">Show</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
