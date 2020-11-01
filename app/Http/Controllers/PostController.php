<?php

namespace App\Http\Controllers;

use App\Models\{Tag, Post, Category};
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;

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
            'post'          => new Post,
            'categories'    => Category::get(),
            'tags'          => Tag::get(),
        ]);
    }

    public function store(PostRequest $request)
    {

        $attr = $request->all();

        // assign title to the slug
        $attr['slug']   = \Str::slug(request('title'));


        // category
        $attr['category_id'] = request('category');

        // create new posts
        $post = Post::create($attr);

        $post->tags()->attach(request('tags'));

        session()->flash('success', 'The post was created');

        return redirect('posts');
    }


    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post'  => $post,
            'categories'    => Category::get(),
            'tags'  => Tag::get(),
        ]);
    }


    public function update(PostRequest $request, Post $post)
    {
        $attr = $request->all();
        $attr['category_id'] = request('category');
        $post->update($attr);
        $post->tags()->sync(request('tags'));

        session()->flash('success', 'The post was updated');
        return redirect('posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        // untuk menghapus tags di tabel post_tag
        $post->tags()->detach();
        session()->flash('success', 'The Post was destroyed');
        return redirect('posts');
    }
}
