@extends('layouts.dashboard')
@section('content')
    <h1>Post </h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary mb-5"><i class="fa-regular fa-square-plus">
            Add </i></a>
    <div class="container"></div>
    <div class="row row-cols-4 ">
        @foreach ($posts as $post)
            <div class="card ct-card" style="width: 18rem;">
                <div class="card-body d-flex flex-column justify-content-between ">
                    <h5 class="card-title">{{ $post->category->name }}</h5>
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ $post->content }}</p>
                    <div class='post-tags d-flex justify-content-start'>
                        @foreach ($post->tags as $tag)
                            <span>[{{ $tag->name }}]</span>
                        @endforeach
                    </div>

                    <div class="ct-buttons">
                        <a href="{{ route('admin.posts.show', $post) }}"
                            class="btn btn-primary justify-self-end""><i class=" fa-regular fa-eye"></i> Show</a>
                        <a href=" {{ route('admin.posts.edit', $post) }}" class="btn btn-success"><i
                                class="fa-solid fa-pen"></i> Edit</a>
                        <form action=" {{ route('admin.posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" value="DELETE" class="btn btn-danger mt-2"> <i
                                    class="fa-regular fa-trash-can"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
