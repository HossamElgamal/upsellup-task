@extends('layouts.master')

@section('content')


        <h1>{{ $post->title }}</h1>
        <p><strong>Author:</strong> {{ $post->author }}</p>
        <hr>
        <p><strong>Content :</strong>{{ $post->content }}</p>

        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>



@endsection
