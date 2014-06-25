@extends('layouts.master')

@section('content')

    <h1>{{ $post->title }} <small class="pull-right">{{ Auth::check() ? link_to_route('posts.edit', 'edit', ['id'=>$post->id]) : '' }}</small></h1>

    @if($post->body)
        <p>{{ $post->body }}</p>
    @endif

    @if($post->link)
        <a href="{{ URL::to($post->link) }}">{{ $post->link }}</a>
    @endif

@stop