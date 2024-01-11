<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Here we are fetching all the posts from the database and passing them to the view.
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Here we are fetching all the categories from the database and passing them to the view.
        $categories = Category::all();
        return view('create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        //Here we are uploading the image to the storage folder and getting the path of the image.

        $fileName = time() . '_' . $request->image->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $filePath;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //show specific post
        $post = Post::findOrFail($id);
        return view('show_post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view("edit", compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePostRequest $request, string $id)
    {

        //Here we are updating the post and uploading the image to the storage folder and getting the path of the image.
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'image', 'max:2048'],
            ]);

            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

//            File::delete(public_path('storage/' . $post->image));
        }
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $filePath;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

