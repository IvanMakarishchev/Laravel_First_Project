@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="postTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="postTitle" placeholder="Title" name="title">
        </div>
        <div class="mb-3">
            <label for="postContent" class="form-label">Content</label>
            <textarea class="form-control" id="postContent" placeholder="Content" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="postImage" class="form-label">Image</label>
            <input type="text" class="form-control" id="postImage" placeholder="Image" name="image">
        </div>
        <div class="mb-3">
            <label for="postCategory" class="form-label">Category:</label>
            <select class="form-select form-select-sm" id="postCategory" aria-label="categorySelect" name="category_id">
                <option selected>-- Select category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection