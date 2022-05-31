@extends('layouts.app')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $post->slug }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
