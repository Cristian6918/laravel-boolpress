@extends('layouts.dashboard')
@section('content')
    <h1>Post </h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary mb-5">Create</a>
    <div class="container"></div>
    <div class="row row-cols-4 ">
        @foreach ($posts as $post)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary justify-self-end"">Show</a>
                                         <a href=" {{ route('admin.posts.edit', $post) }}"
                        class="btn btn-success">Edit</a>
                    <form action=" {{ route('admin.posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE" class="btn btn-danger mt-2">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
