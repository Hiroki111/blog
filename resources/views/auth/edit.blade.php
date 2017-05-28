@extends('layouts.app')

@section('content')
<div class="container">
  @if ( session()->has('message') )
  <span style="color:red;margin-left:2em; font-size: 10pt">{{ session()->get('message') }}</span>
  @endif

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if(isset($post))
  <h3 style="border-bottom: solid 1px #ddd;">Editing Post</h3>
  @else
  <h3 style="border-bottom: solid 1px #ddd;">Add New Post</h3>
  @endif

  @if(isset($post))
  <form action="/admin/{{$post->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @else
    <form action="/admin" method="POST" enctype="multipart/form-data">
      @endif
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <input type="hidden" name="action" value="add">
      <div class="">
        <div class="control-group">
          <div>
            @if(isset($post))
            <div style="width: 100px; display:inline-block;">Active Status</div>
            <div style="display:inline-block;">
              <input type="checkbox" name="active" @if($post->active === 1)checked @endif />
            </div>
             <div style="width: 100px;">Title</div>
            <div style="display:inline-block;">
              <input type="text" name="title" value="{{$post->title}}" />
            </div>
            <div style="width: 100px; ">Body</div>
            <div style="width: 100px; display:inline-block;">
              <textarea rows="20" cols="80" name="body">{{$post->body}}</textarea>
            </div>
            <input type="hidden" value="{{$post->id}}" name="id" />
            @else
            <div style="width: 100px; display:inline-block;">Active Status</div>
            <div style="display:inline-block;">
              <input type="checkbox" name="active" checked />
            </div>
            <div style="width: 100px; ">Title</div>
            <div style="display:inline-block;">
              <input type="text" name="title" />
            </div>
            <div style="width: 100px; ">Body</div>
            <div style="width: 100px; display:inline-block;">
              <textarea rows="20" cols="80" name="body"></textarea>
            </div>
            @endif
          </div>
          <div class="control-group">
            <input class="submit btn btn-primary" type="submit" value="Save"/>
            <a class="cancel btn btn-warning" href="/admin">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>
  @endsection