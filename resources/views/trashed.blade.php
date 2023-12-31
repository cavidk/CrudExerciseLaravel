@extends('layouts.master')

@section('content')

    <h1 style="font-family: Calibri,fantasy">This is form index illustrated here</h1>
    <div class="main-content mt-6">
        <div class="card">
            <div class="card-header">All Trashed Posts</div>
        </div>

        <div class="mt-3 mb-3">
            <h4>Trashed Posts</h4>
            <div class="col-md-15 d-flex justify-content-end">
                <a class="btn btn-success mx-1">Back</a>
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
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <img src="https://picsum.photos/id/237/200/300" width="25%" alt="">
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
                </tbody>
            </table>
        </div>
    </div>
@endsection

