@extends('layouts.master')

@section('content')

    <h1 class="mb-4" style="font-family: Calibri, fantasy">Posts Index</h1>

    <div class="main-content mt-6">
        <div class="card">
            <div class="card-header">All Posts</div>

            <div class="mt-2 mb-1">
                <div class="col-md-15 d-flex justify-content-end"> {{-- Adjusted justify-content-end --}}
                    <a class="btn btn-success mx-2" href="{{ route("posts.create") }}">Create</a>
                    <a class="btn btn-warning" href="{{route('posts.trashed')}}" style="margin-right: 20px">Trashed</a>
                </div>
            </div>

            <div class="card-body">
                @if ($posts->isEmpty())
                    <p>No posts found.</p>
                @else
                    <table class="table table-striped table-bordered border-dark">
                        <thead style="background: #e2e8f0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 20%">Image</th>
                            <th scope="col" style="width: 30%">Title</th>
                            <th scope="col" style="width: 10%">Description</th>
                            <th scope="col" style="width: 10%">Category</th>
                            <th scope="col" style="width: 10%">Publish Date</th>
                            <th scope="col" style="height: 10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Iterate over posts --}}
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>
                                    <img src="{{ Storage::disk('public')->url($post->image) }}" width=35%" alt="">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category_id }}</td>
                                {{-- Format the date --}}
                                <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{route('posts.show',$post->id)}}">Show</a>
                                    <a class="btn btn-primary btn-sm mx-1" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this post?')">
                                            Delete
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
