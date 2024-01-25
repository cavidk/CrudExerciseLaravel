@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-end mt-3">
        <div class="row col-md-6" style="width: 23%">
            <form action="{{ route('posts.index') }}" method="GET" class="form-inline">
                <div class="input-group mb-2">
                    <input type="text" name="search" class="form-control" placeholder="Search a post"
                           aria-label="Search" aria-describedby="searchIcon">
                    <button type="submit" class="btn btn-primary btn-sm ml-2" id="searchIcon">
                        <i class="fa fa-search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </i> <!-- Assuming you are using Bootstrap Icons (bi) library -->
                    </button>
                </div>
            </form>
        </div>
    </div>

    <h1 class="mb-4" style="font-family: Calibri, fantasy">Posts Index</h1>

    <div class="main-content mt-6">
        <div class="card">
            <div class="card-header">All Posts</div>

            <div class="mt-2 mb-1">
                <div class="col-md-15 d-flex justify-content-end">
                    <a class="btn btn-success mx-2 btn-sm" href="{{ route("posts.create") }}">Create</a>
                    <a class="btn btn-warning btn-sm" href="{{route('posts.trashed')}}" style="margin-right: 20px">Trashed</a>
                </div>
            </div>

            <div class="card-body text-center"> {{-- Center-align the content --}}
                @if ($posts->isEmpty())
                    <p>No posts found.</p>
                @else
                    <table class="table table-striped table-bordered border-3">
                        <thead style="background: #e2e8f0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 20%">Image</th>
                            <th scope="col" style="width: 10%">Title</th>
                            <th scope="col" style="width: 10%">Status</th>
                            <th scope="col" style="width: 20%">Description</th>
                            <th scope="col" style="width: 10%">Category</th>
                            <th scope="col" style="width: 10%">Publish Date</th>
                            <th scope="col" style="width: 15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Iterate over posts --}}
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>
                                    <img src="{{ Storage::disk('public')->url($post->image) }}" width=30%" alt="">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <button
                                        class="btn btn-sm {{ $post->status == 'active' ? 'btn-success' : 'btn-danger' }}"
                                        data-bs-toggle="modal" data-bs-target="#statusModal{{ $post->id }}">
                                        {{ $post->status }}
                                    </button>
                                </td>
                                <td>{{ $post->description }}</td>
                                {{--relation for post->category--}}
                                <td>{{ $post->category->name}}</td>
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
                    {{-- Pagination links --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{$posts->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal for Status Update -->
    @foreach($posts as $post)
        <div class="modal fade" id="statusModal{{ $post->id }}" tabindex="-1"
             aria-labelledby="statusModalLabel{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel{{ $post->id }}">Update Status for Post
                            #{{ $post->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('posts.updateStatus', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="status" class="form-label">Select Status</label>
                                <select class="form-select" name="status" id="status" required>
                                    <option value="active" {{ $post->status == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ $post->status == 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
