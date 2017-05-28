@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($posts) === 0)
    <div>
        <h3>No blogs are available.</h3>
    </div>
    @else
    @foreach($posts as $post)
    <h2 class="titleDiv" id="title_{{$post->id}}">{{$post->title}}</h2>
    <h4>Published At : {{date("d/m/Y", strtotime($post->published_at))}}</h4>
    <h4>Author :{{$post->user->name}}</h4>
    <div >
        <div id="body_{{$post->id}}" class="show_partially" style="width: 800px;">{{$post->body}}</div>
    </div>
    @endforeach
    @endif
</div>
<script type="text/javascript">
    $(document).ready(function(){
       $('.titleDiv').click(function(){
        var id = $(this).attr('id').replace('title_','body_');
        if ($("#" + id).hasClass("show_partially")) {
            $("#" + id).removeClass("show_partially");
        }else {
            $("#" + id).addClass("show_partially");
        }
    });
   });
</script>
@endsection
