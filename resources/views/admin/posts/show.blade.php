@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h1>{{ $post->category->name }}</h1>
        <div class="card mb-4">
            <div class="card-header">
                {{ $post->slug }}
            </div>
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <div class='post-tags d-flex justify-content-start'>
                        @foreach ($post->tags as $tag)
                            <span>{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
@endsection
