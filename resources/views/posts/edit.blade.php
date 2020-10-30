@extends('layouts.app', ['title' => 'Edit Post'])

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-6">



            <div class="card">
                <div class="card-header">Update Post {{ $post->title }}</div>
                <div class="card-body">
                    <form action="/posts/{{ $post->slug }}/edit" method="post">
                        @csrf
                        @method('patch')
                        @include('posts.partials.form-control', ['submit' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection