@extends('layouts.main')
@section('content')
    <a href="{{ route('post.create') }}">
        <button class="btn btn-primary">
            Create new post
        </button>
    </a>
    @foreach ($posts as $post)
        <div>
            {{ $post->id }}. <a href="{{ route("post.show", [$post->id]) }}">{{ $post->title }}</a>
        </div>
    @endforeach
@endsection