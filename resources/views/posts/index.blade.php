@extends('layouts.app')

@section('content')
<div class="container">


    <div class="d-flex justify-content-between">
        <div>
            <h4>All Post</h4>
            <hr />
        </div>
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
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

                    <div class="card-body">
                        <div>
                            {{ Str::limit($post->body, 100, '.') }}
                        </div>

                        <a href="/posts/detail/{{ $post->slug }}">Read More</a>

                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        Published on {{ $post->created_at->diffForHumans() }}
                        <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
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