@extends('layouts.master')

@section('content')

    {{--This is the code for the create.blade.php file-catching emtpty field input--}}
    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '{!! implode("<br>", $errors->all()) !!}',
            });
        </script>
    @endif

    <h1 class="mb-3" style="font-family: Calibri,fantasy">Add your next post below</h1>

    <div class="card">
        <div class="main-content md-6">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Create a post☄</h4>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <a href="{{ route("posts.index") }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body"></div>
                        <div class="form-group">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" style="width: 100%" name="image">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label mt-3">Title</label>
                            <input type="text" class="form-control" style="width: 100%" name="title">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label mt-3">Category</label>
                            <select id="" class="form-control" style="width: 100%" name="category_id">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label mt-3">Description</label>
                            <textarea name="description" id="" cols="40" rows="5" class="form-control"
                                      placeholder="add description here"></textarea>
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
