<!-- resources/views/posts/show.blade.php -->

@extends('layouts.master')

@section('content')

    <h1 class="mb-4" style="font-family: Calibri, fantasy">Show Post</h1>

    <div class="main-content mt-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Post Details</span>
                <div class="col-md-4 d-flex justify-content-end">
                    <a class="btn btn-primary btn-sm" href="{{ route("posts.index") }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                        </svg>
                    </a>
                </div>
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
