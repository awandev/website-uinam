<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(6),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', [
            'post'  => new Post,
        ]);
    }

    public function store(PostRequest $request)
    {


        // validate the field
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body'  => 'required',
        ]);

        // assign title to the slug
        $attr['slug']   = \Str::slug(request('title'));

        // create new posts
        Post::create($attr);

        session()->flash('success', 'The post was created');

        return redirect('posts');
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Post $post)
    {
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body'  => 'required',
        ]);

        $post->update($attr);
        session()->flash('success', 'The post was updated');
        return redirect('posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', 'The Post was destroyed');
        return redirect('posts');
    }
}
