@extends('layout.master')
@section('content')



<section id="featured">



<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Get in touch</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li class="active">Contact</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
    
      <div class="container">
      <a href="{{ url('posts') }}" class="btn btn-info pull-right">All Posts</a>
        <div class="row">
          <div class="span12">
            <form action="{{ url('/post/update') }}" method="post" role="form" class="contactForm">
              @csrf
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <input type="hidden" name="id" value="{{ $post->id }}">
              <div class="row">
                <div class="span6 form-group">
                  <input type="text" name="title" class="form-control" id="name" value="{{ $post->title }}" placeholder="Ttile" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                  <div class="validation"></div>
                </div>
                <div class="span6 form-group">
                  <input type="text" class="form-control" name="author_name" id="email" value="{{ $post->author_name }}" placeholder="Author Name" data-rule="email" data-msg="Please enter a valid email" required/>
                  <div class="validation"></div>
                </div>
                <div class="span12 margintop10 form-group">
                  <textarea class="form-control" name="description"  rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Description" required>{{ $post->description }}</textarea>
                  <div class="validation"></div>  
                  <p class="text-center">
                    <button class="btn btn-large btn-theme margintop10" type="submit">Update</button>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  

@stop