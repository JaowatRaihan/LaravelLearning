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
    
  
    @if(Session('success'))
    <div class="alert alert-success foo" role="alert"> 
      {{ Session('success') }} {{ Session::forget('success') }} 
    </div>
    @elseif(Session('error'))
      <div class="alert alert-danger foo" role="alert"> 
      {{ Session('error') }} {{ Session::forget('error') }} 
      </div>
     @endif

      <div class="container">
      <a href="{{ url('posts') }}" class="btn btn-info pull-right">Post List</a>
        <div class="row">
          <div class="span12">
            <h4>Get in touch with us by filling <strong>contact form below</strong></h4>

            <form action="{{ url('/posts/add') }}" method="post" role="form" class="contactForm">
              @csrf
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>

              <div class="row">
                <div class="span6 form-group">
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="name" placeholder="Ttile" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                  @error('title')
                      <small class="help-block text-danger">{{ $message }}</small>
                  @enderror
                  <div class="validation"></div>
                </div>
                <div class="span6 form-group">
                  <input type="text" class="form-control" name="author_name" value="{{ old('author_name') }}" id="email" placeholder="Author Name" data-rule="email" data-msg="Please enter a valid email" required/>
                  <div class="validation"></div>
                </div>
                <div class="span12 margintop10 form-group">
                  <textarea class="form-control" name="description"  rows="12" data-rule="required" data-msg="Please write something for us" placeholder="Description" required>{{ old('description') }}</textarea>
                  @error('description')
                      <small class="help-block text-danger">{{ $message }}</small>
                  @enderror
                  <div class="validation"></div>  
                  <p class="text-center">
                    <button class="btn btn-large btn-theme margintop10" type="submit">Create Post</button>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  

@stop