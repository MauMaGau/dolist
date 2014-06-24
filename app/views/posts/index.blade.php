@extends('layouts.master')

@section('content')

    <ul class="list-unstyled">
        @foreach($posts as $post)
            <li>
                <a href="{{ URL::route('posts.show', $post->id) }}">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ str_limit($post->body, 100, '...') }}</p>
                </a>
            </li>
        @endforeach
    </ul>
@stop