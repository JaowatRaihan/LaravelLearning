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
      <a href="{{ url('post/create') }}" class="btn btn-default pull-right">Create New Post</a>
        <div class="row">
          <div class="span12">
            <h4>Default Styles with hover enabled</h4>
            @if(!empty($posts))
            <table class="table table-hover">
              <thead>
                <tr>
                  <th> Sl. </th>
                  <th>  Title </th>
                  <th> Auhtor </th>
                  <th>  Description  </th>
                  <th>  Create Time  </th>
                  <th> Option </th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($posts as $key => $post)
                <tr>
                  <td> {{ ++ $key }} </td>
                  <td> {{$post->title }}  </td>
                  <td> {{$post->author_name }}  </td>
                  <td> {{$post->description }}  </td>
                  <td> {{$post->created_at->format('d/m/Y - h:i a') }}  </td>
                  <td>
                      <a href="{{ url('post/view/'. $post->id) }}" title="View" class="btn btn-primary">View</a>
                      <a href="Edit" title="Edit" class="btn btn-info">Edit</a>
                      <a href="{{ url('post/delete/'. $post->id) }}" title="Delete" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    </section>
  

@stop