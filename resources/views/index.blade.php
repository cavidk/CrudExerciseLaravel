@extends('layouts.master')

@section('content')

    <h1 style="font-family: Calibri,fantasy">This is form index illustrated here</h1>
    <div class="main-content mt-6">
        <div class="card">
            <div class="card-header">All Posts</div>
        </div>

        <div class="mt-3 mb-3">
        <div class="col-md-15 d-flex justify-content-end">
            <a class="btn btn-success mx-1" href="{{route("posts.create")}}">Create</a>
            <button type="button" class="btn btn-warning">Trashed</button>
        </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered border-dark">
                <thead style="background: #e2e8f0">
                <tr>
                    <th scope="col width: 5%">#</th>
                    <th scope="col" style="width: 20%">Image</th>
                    <th scope="col" style="width: 30%">Title</th>
                    <th scope="col" style="width: 10%">Description</th>
                    <th scope="col" style="width: 10%">Category</th>
                    <th scope="col" style="width: 10%">Publish Date</th>
                    <th scope="col" style="height: 10%">Action</th>
                </tr>
                </thead>
                <tbody>

                {{--Here we will create a post--}}
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>
                            <img src="{{Storage::disk('public')->url($post->image)}}" width="25%" alt="">
                        </td>
                        <td>Lorem Ipsum is simply dummy text.</td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>News</td>
                        <td>2-5-23</td>
                        <td>
                            <button type="button" class="btn btn-info">Show</button>
                            <a class="btn btn-primary mx-1">Edit</a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
