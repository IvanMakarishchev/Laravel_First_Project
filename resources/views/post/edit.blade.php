@extends('layouts.main')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <class="mb-3">
            <label for="postTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="postTitle" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="postContent" class="form-label">Content</label>
            <textarea class="form-control" id="postContent" name="content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="postImage" class="form-label">Image</label>
            <input type="text" class="form-control" id="postImage" value="{{ $post->image }}" name="image">
        </div>
        <div class="mb-3">
            <label for="postCategory" class="form-label">Category:</label>
            <select class="form-select form-select-sm" id="postCategory" aria-label="categorySelect" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? "selected" : "" }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit post</button>
    </form>
    <a href="{{ route("post.show", $post->id) }}">
        <button class="btn btn-primary">Cancel edit</button>
    </a>
@endsection