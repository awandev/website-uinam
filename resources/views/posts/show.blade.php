@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <div class="text-secondary">
        {{ $post->category->name }}
    </div>
    <p>{{ $post->body }}</p>
    <div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-link text-danger btn-sm p-0" data-toggle="modal"
            data-target="#exampleModal">
            Delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda Yakin ? </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-2">
                            <div>{{ $post->title }}</div>
                            <div class="text-secondary">
                                <small> : {{ $post->created_at->format("d F, Y") }}</small>
                            </div>
                        </div>

                        <form action="/posts/{{ $post->slug }}/delete" method="post">
                            @csrf
                            @method("delete")

                            <div class="d-flex">

                            </div>

                            <button class="btn btn-danger mr-2" type="submit">Delete</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>
@endsection