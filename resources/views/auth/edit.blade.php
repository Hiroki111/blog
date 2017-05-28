@extends('layouts.app')

@section('content')
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
      <div class="col-sm-9">
        <div class="control-group">
          <div>
            @if(isset($post))
            Title<input type="text" name="title" value="{{$post->title}}" /><br>
            Body<textarea rows="20" cols="80" name="content">{{$post->body}}</textarea>
            @else
            Active Status<input type="checkbox" name="active" checked /><br>
            Title<input type="text" name="title" /><br>
            Body<textarea rows="20" cols="80" name="body"></textarea>
            @endif
          </div>
          <div class="control-group">
            <input class="submit btn btn-primary pull-right" type="submit" value="Save"/>
            <a class="cancel btn btn-primary pull-right" href="/admin">Cancel</a>
          </div>
        </div>
    </div>
  </form>

@endsection