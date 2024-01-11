<!-- resources/views/posts/show.blade.php -->

@extends('layouts.master')

@section('content')

    <h1 class="mb-4" style="font-family: Calibri, fantasy">Show Post</h1>

    <div class="main-content mt-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Post Details</span>
                <a class="btn btn-secondary btn-sm" href="{{ route("posts.index") }}">Main</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ Storage::disk('public')->url($post->image) }}" width="100%" alt="Post Image">
                    </div>
                    <div class="col-md-9">
                        <h3><strong>Title:</strong> {{ $post->title }}</h3>
                        <p><strong>Description:</strong> {{ $post->description }}</p>
                        <p><strong>Category:</strong> {{ $post->category_id }}</p>
                        <p><strong>Publish Date:</strong> {{ $post->created_at->format('d-m-Y') }}</p>
                        <p><strong>ID:</strong> {{ $post->id }}</p>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}" style="margin-right: 7px">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this post?')">Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
