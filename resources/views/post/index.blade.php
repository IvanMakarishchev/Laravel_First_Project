@extends('layouts.main')
@section('content')
    @foreach ($posts as $post)
        <div>
            {{ $post->id }}. {{ $post->title }}
        </div>
    @endforeach
    <a href="{{ route('post.create') }}">
        <button class="btn btn-primary">
            Create new post
        </button>
    </a>
@endsection