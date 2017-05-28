@extends('layouts.app')

@section('content')

<table cellspacing="0" cellpadding="0" border="0" class="table table-striped" style="width: 80%" align="center">
    @if(count($posts) === 0)
    <tr>
        <td>No blogs are available.</td>
    </tr>
    @else
    <tr>
        <th style="min-width: 20px;">Title</th>
        <th style="min-width: 400px;">Body</th>
        <th style="min-width: 50px;">Published At</th>
        <th style="min-width: 150px;">Author</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td class="titleDiv" id="title_{{$post->id}}">{{$post->title}}</td>
        <td id="body_{{$post->id}}" class="show_partially">
            <div style="width: 500px;">
                {!!$post->body!!}
            </div>
        </td>
        <td>{{date("d/m/Y", strtotime($post->published_at))}}</td>
        <td>{{$post->user->name}}</td>
    </tr>
    @endforeach
    @endif
</table>
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
