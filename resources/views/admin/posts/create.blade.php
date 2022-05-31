@extends('layouts.app')
@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Example label</label>
            <input type="text" class="form-control" id="title" placeholder="Insert Title" name='title'>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Another label</label>
            <textarea type="text" class="form-control" id="content" placeholder="Insert Content" name='content'> </textarea>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection
