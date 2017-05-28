@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/admin/create" class="btn btn-sm btn-primary pull-right">Add New Entry</a>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @if(count($posts) === 0)
                <div class="panel-body">
                    No blogs are available.
                </div>
                @else
                <div class="panel-body">
                    <table>
                        <tr>
                            <th style="width: 20px;">ID</th>
                            <th style="width: 150px;">Author</th>
                            <th style="width: 50px;">Active</th>
                            <th style="min-width: 400px;">Title</th>
                            <th style="">Option</th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>@if((int)$post->active === 1) TRUE @else FALSE @endif</td>
                            <td>{{$post->title}}</td>

                            <td>
                                <a href="">Edit</a>
                                <form method="POST" action="" onsubmit="">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit"  class="btn btn-link text-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
