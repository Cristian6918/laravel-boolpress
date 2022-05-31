@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        CHANGE
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                placeholder="Insert Title" name='title' value="{{ $post->title }}">
        </div>
        @error('title')
            <div class="  invalid-feedback">{{ $message }}
            </div>
        @enderror
        <div class="     mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control  @error('content') is-invalid @enderror" id="content"
                placeholder="Insert Content" name='content'>{{ $post->content }} </textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
    </form>
@endsection
