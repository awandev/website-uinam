@extends('layouts.app')

@section('content')
<div class="container">


    <div class="d-flex justify-content-between">
        <div>

            @isset($category)
            <h4>Category: {{ $category->name }}</h4>
            @endisset

            @isset($tag)
            <h4>Tag: {{ $tag->name }}</h4>
            @endisset

            @if(!isset($tag) && !isset($category))
            <h4>All Posts</h4>
            @endif


            <hr />
        </div>
        <div>

            @if (Auth::check())
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login to create new post</a>
            @endif

        </div>
    </div>

    <div class="row">

        @foreach ($posts as $post)




        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card">
                    <div class="card-header">
                        {{ $post->title }}
                    </div>

                    <img style="height: 270px; object-fit: cover; object-position: center;" src="{{ $post->takeImage }}"
                        class="card-img-top">

                    <div class="card-body">
                        <div>
                            {{ Str::limit($post->body, 100, '.') }}
                        </div>

                        <a href="/posts/{{ $post->slug }}">Read More</a>

                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        Published on {{ $post->created_at->diffForHumans() }}

                        @can('update', $post)
                        <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                        @endcan
                    </div>

                </div>
            </div>
        </div>




        @endforeach
    </div>


    <div class="d-flex justify-content-center">

        {{ $posts->links() }}
    </div>


</div>
@endsection