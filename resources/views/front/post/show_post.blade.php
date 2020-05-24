@extends('layout.master')
@section('content')

<section id="featured">
    <section id="content">
        <div class="container">
            <a href="{{ url('posts/edit') }}" class="btn btn-info pull-right">Edit List</a>
            <a href="{{ url('posts') }}" class="btn btn-info pull-right">All Posts</a>
            <div class="row">
                <div class="span12">
                    <h2>{{ $post->title }}</strong></h4>
                    <hr />
                    <h3>{{ $post->description }}</h3>
                    <p></p>
                    <div class="pull-right">
                        <smaill>
                            Posted By: {{ $post->author_name }}
                            Posted On: {{ $post->created_at->format('d/m/Y - h:i a') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop