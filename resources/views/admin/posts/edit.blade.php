@extends('layouts.dashboard')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            CHANGE
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Insert Title" name='title' value="{{ $post->title }}">
                @error('title')
                    <div class="  invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Category </label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">--Choose a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="     mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" class="form-control  @error('content') is-invalid @enderror" id="content"
                    placeholder="Insert Content" name='content'>{{ $post->content }} </textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">

                <h5>Tags</h5>
                @foreach ($tags as $tag)
                    @if ($errors->any())
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name='tags[]'
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} />
                    @else
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name='tags[]'
                            {{ $post->tags->contains($tag) ? 'checked' : '' }} />
                    @endif
                    <div class="form-check-label">{{ $tag->name }}
                    </div>
                @endforeach
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Back</a>
        </form>
    </div>
@endsection
