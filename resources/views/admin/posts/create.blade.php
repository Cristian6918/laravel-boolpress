@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">

            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                placeholder="Insert Title" name='title' value='{{ old('title') }}'>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">

            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content"
                placeholder="Insert Content" name='content'> {{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection
