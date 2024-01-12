<!-- resources/views/posts/trashed.blade.php -->

@extends('layouts.master')

@section('content')

    <h1 class="mb-4" style="font-family: Calibri, fantasy">Trashed Posts</h1>

    <div class="main-content mt-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Trashed Posts</span>
                <div class="col-md-4 d-flex justify-content-end">
                    <a class="btn btn-primary btn-sm" href="{{ route("posts.index") }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                             class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                            <path fill-rule="evenodd"
                                  d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if ($posts->isEmpty())
                    <p>No trashed posts found.</p>
                @else
                    <table class="table table-striped table-bordered border-dark">
                        <thead style="background: #e2e8f0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 20%">Image</th>
                            <th scope="col" style="width: 30%">Title</th>
                            <th scope="col" style="width: 10%">Description</th>
                            <th scope="col" style="width: 10%">Category</th>
                            <th scope="col" style="width: 10%">Deleted At</th>
                            <th scope="col" style="height: 10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Iterate over trashed posts --}}
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>
                                    <img src="{{ Storage::disk('public')->url($post->image) }}" width="35%" alt="">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category_id }}</td>
                                {{-- Format the date --}}
                                <td>{{ $post->deleted_at->format('d-m-Y') }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm">Restore</a>
                                    <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to permanently delete this post?')">
                                            Permanently Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
