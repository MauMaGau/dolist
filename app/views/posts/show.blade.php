@extends('layouts.master')

@section('content')

    <h1>{{ $post->title }} <small class="pull-right">{{ Auth::check() ? link_to_route('posts.edit', 'edit', ['id'=>$post->id]) : '' }}</small></h1>

    <p>{{ $post->body }}</p>

@stop