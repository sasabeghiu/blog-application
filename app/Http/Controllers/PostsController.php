<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //only allow authenticated users to create, edit, update and delete posts
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all posts from the database with pagination and ordering by last created
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')
                ->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')
                ->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('cover_image')
                ->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        //set user_id to the current user
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        // Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate input
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')
                ->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')
                ->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('cover_image')
                ->storeAs('public/cover_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body  = $request->input('body');

        //check if post already has a image, if not set it to the new image
        if ($request->hasFile('cover_image')) {
            //if post already has a image, delete it
            if ($post->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/' . $post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        // Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        // Delete Image if it exists
        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
