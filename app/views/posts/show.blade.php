@extends('layouts.master')

@section('content')

    <h1>{{ $post->title }} <small class="pull-right">{{ Auth::check() ? link_to_route('posts.edit', 'edit', ['id'=>$post->id]) : '' }}</small></h1>

    @if($post->body)
        <p>{{ $post->body }}</p>
    @endif

    @if($post->link)
        <a href="{{ URL::to($post->link) }}">{{ $post->link }}</a>
    @endif

    @if($post->resource)
        @if(in_array(File::extension($post->resource->relative_path), ['jpg','png','gif']))
            <img src="{{ URL::to('uploads/'.$post->resource->relative_path) }}">
        @else
            <a href="{{ URL::to('uploads/'.$post->resource->relative_path) }}">Download</a>
        @endif
    @endif

@stop