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
        <td>{{$post->title}}</td>
        <td style="height: 40px;">
            <div style="width: 400; height: 150px; overflow:hidden;">
                {!!$post->body!!}
            </div>
        </td>
        <td>{{date("d/m/Y", strtotime($post->published_at))}}</td>
        <td>{{$post->user->name}}</td>
    </tr>
    @endforeach
    @endif
</table>



@endsection
