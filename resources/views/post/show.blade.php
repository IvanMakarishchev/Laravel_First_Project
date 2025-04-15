@extends('layouts.main')
@section('content')
    <div>
        {{ $post->title }}
    </div>
    <div>
        {{ $post->content }}
    </div>
    <div>
        {{ $post->image }}
    </div>
    <a href="{{ route('post.index') }}">
        <button class="btn btn-primary">
            Back
        </button>
    </a>
@endsection