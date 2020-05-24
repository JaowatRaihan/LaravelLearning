@extends('layout.master')
@section('content')

<section id="featured">
    <section id="content">
        <div class="container">
            <a href="{{ url('post/edit/1') }}" class="btn btn-info pull-right">Edit This Post</a> &nbsp;
            <a href="{{ url('posts') }}" class="btn btn-info pull-right">All Posts</a>
            <div class="row">
                <div class="span12">
                    <h3>{{ $post->title }}</strong></h3>
                    <hr />
                    <h5>{{ $post->description }}</h5>
                    <p></p>
                    <div>
                        <smaill>
                            Posted By: {{ $post->author_name }} <br />
                            Posted On: {{ $post->created_at->format('d/m/Y - h:i a') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop