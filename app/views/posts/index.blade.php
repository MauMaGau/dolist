@extends('layouts.master')

@section('content')

    <ul class="nav nav-pills nav-stacked">
        @foreach($posts as $post)
            <li>
                <a href="{{ URL::route('posts.show', $post->id) }}" class="clearfix">
                    <h2 class="pull-left">{{ $post->title }}</h2>
                    <p><small class="pull-right">{{ date('l \t\h\e jS \o\f F\, Y', strtotime($post->created_at)) }}</small></p>
                </a>
            </li>
        @endforeach
    </ul>
@stop