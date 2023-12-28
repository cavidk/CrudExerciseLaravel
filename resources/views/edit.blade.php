@extends('layouts.master')

@section('content')

    <h1 class="mb-3" style="font-family: Calibri,fantasy">Edit post at below</h1>
    <div>
        <div class="card"></div>
        <div class="main-content md-6">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Edit a post☄</h4>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-success">Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 d-flex justify-content-end">
                        <div class="card-body">
                            <img class="mt-5 m-lg-5" src="{{Storage::disk('public')->url($post->image)}}"
                                 style="width: 170px" alt="">
                        </div>
                        <form action="">
                            <div class="card-body"></div>
                            <div class="form-group">

                                <label for="" class="form-label">Image</label>
                                <input type="file" class="form-control" style="width: 200%">
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="form-label">Title</label>
                                <input type="title" class="form-control" style="width: 200%" value="{{$post->title}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="form-label">Category</label>
                                <select name="" class="form-control" style="width: 200%">
                                    <option>Select</option>
                                    @foreach($categories as $category)
                                        <option
                                            {{$category->id == $post->category_id ? 'selected' : ''}}
                                            value="{{$category->id}}">{{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="form-label">Description</label>
                                <textarea
                                    cols="40" rows="5" class="form-control" placeholder="add description">
                                     {{$post->description}}
                                </textarea>
                            </div>
                            <div class="col-md-20 d-flex justify-content-center mt-3 mb-2">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
