@extends('layouts.master')

@section('content')

    <ul class="list-unstyled">
        @foreach($posts as $post)
            <li class="clearfix">
                <a href="{{ URL::route('posts.show', $post->id) }}">
                    <h2 class="pull-left">{{ $post->title }}</h2>
                    <p><small class="pull-right">{{ date('l \t\h\e jS \o\f F\, Y', strtotime($post->created_at)) }}</small></p>
                    <p class="text-muted" style="clear:both">{{ str_limit($post->body, 100, '...') }}</p>
                </a>
            </li>
        @endforeach
    </ul>
@stop