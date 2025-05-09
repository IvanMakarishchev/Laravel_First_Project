@extends('layouts.main')
@section('content')
    <a href="{{ route('post.create') }}">
        <button class="btn btn-primary">
            Create new post
        </button>
    </a>
    @foreach ($posts as $post)
        <div>
            {{ $post->id }}. <a href="{{ route("post.show", $post->id) }}">{{ $post->title }}</a>
            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection