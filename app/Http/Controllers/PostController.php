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
        $slug = \Str::slug(request('title'));
        $attr['slug']   = $slug;

        // bila ada gambar, maka upload dan variabel thumbnail = namafile
        // bila tidak ada, nama file = NULL
        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/posts") : null;





        // category
        $attr['category_id'] = request('category');

        $attr['thumbnail']  = $thumbnail;
        // create new posts with user id from users table (login)
        $post = auth()->user()->posts()->create($attr);

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


        // authorize from postpolicy
        $this->authorize('update', $post);


        // check , bila ada gambar yang diubah, 
        // maka hapus gambar sebelumnya
        if (request()->file('thumbnail')) {
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/posts");
        } else {
            $thumbnail = $post->thumbnail;
        }



        $attr = $request->all();
        $attr['category_id'] = request('category');
        $attr['thumbnail']  = $thumbnail;
        $post->update($attr);
        $post->tags()->sync(request('tags'));

        session()->flash('success', 'The post was updated');
        return redirect('posts');
    }

    public function destroy(Post $post)
    {




        // mengecek hanya yang punya post yang dapat melakukan delete
        // gunakan authorize dari PostPolicy
        $this->authorize('delete', $post);

        \Storage::delete($post->thumbnail);

        $post->tags()->detach();
        $post->delete();

        session()->flash('success', 'The Post was deleted');
        return redirect('posts');
    }
}
