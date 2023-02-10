<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Get and show single post
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
}

    //Show Create form
    public function create() {
        return view('posts.create');
    }

    //Store Post data
    public function store(Request $request) {
        
        $formFields = $request->validate([
            'title' => 'required',
            'location' => ['required'],
            'email' => 'email',
            'tags' => 'required',
            'username' => '',
            'description' => 'required',
            'website' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);

        

        return redirect('/')->with('message', 'Post created successfully!');
    }

    //Show Edit form
    public function edit(Post $post) {
        return view('posts.edit', ['post' => $post]);
    }

    // Update Post Data

    public function update(Request $request, Post $post) {
        


        $formFields = $request->validate([
            'title' => 'required',
            'location' => ['required'],
            'email' => 'email',
            'tags' => 'required',
            'username' => '',
            'description' => 'required',
            'website' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $post->update($formFields);

        

        return back()->with('message', 'Post updated successfully!');
    }

    //Delete Post
    public function destroy(Post $post) {
        $post->delete();
        return redirect('/')->with('message', 'Post deleted successfully!');
    }

    //Manage Post
    public function manage() {
        $user = Auth::user();
        // dd($user);
        return view('posts.manage', ['posts' => auth()->user()->posts()->get()]);
    }
}
