@extends('layouts.master')

@section('content')

        @if(empty($post->id))
            {{ Form::open(['route'=>'posts.store', 'method'=>'post', 'class'=>'form-horizontal']) }}
        @else
            {{ Form::open(['route'=>['posts.update', $post->id], 'method'=>'put', 'class'=>'form-horizontal']) }}
        @endif
            <div class="form-group">
                @if(empty($post->id))
                    <legend>Create</legend>
                @else
                    <legend>Edit <small><a href="{{ URL::route('posts.show', ['id'=>$post->id]) }}" class="pull-right">view</a></small></legend>
                @endif

            </div>

            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Title:</label>
                <div class="col-sm-10">
                    <input type="text" name="title" id="inputTitle" class="form-control" value="{{ $post->title ?: Input::old('title') }}" required="required">
                    {{ $errors->first(null, '<p class="bg-danger">:message</p>') }}
                </div>
            </div>


            <div class="form-group">
                <div class="btn-group col-sm-10 col-sm-offset-2">
                    <button type="button" class="btn btn-default js-show-control" data-show=".js-show-link">Link</button>
                    <button type="button" class="btn btn-default js-show-control" data-show=".js-show-file">File</button>
                    <button type="button" class="btn btn-default js-show-control" data-show=".js-show-body">Text</button>
                </div>
            </div>

            <div class="form-group js-show js-show-link" {{ $post->link ?: 'style="display:none"' }} >
                <label for="inputLink" class="col-sm-2 control-label">Link:</label>
                <div class="col-sm-10">
                    <input type="text" name="link" id="inputLink" class="form-control" value="{{ $post->link ?: Input::old('link') }}">
                </div>
            </div>

            <div class="form-group js-show js-show-file" {{ $post->file ?: 'style="display:none"' }} >
                <label for="inputFile" class="col-sm-2 control-label">File:</label>
                <div class="col-sm-10">
                    <input type="file" name="file" id="inputFile" class="form-control" value="">
                </div>
            </div>

            <div class="form-group js-show js-show-body" {{ $post->body ?: 'style="display:none"' }} >
                <label for="inputBody" class="col-sm-2 control-label">Text:</label>
                <div class="col-sm-10">
                    <textarea name="body" id="inputBody" class="form-control">{{ $post->body ?: Input::old('body') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    {{ Form::close() }}

    @if($post->id)
        {{ Form::open(array('route' => array('posts.destroy', $post->id), 'method' => 'delete')) }}
                <button type="submit" href="{{ URL::route('posts.destroy', $post->id) }}" class="btn btn-danger btn-xs">Delete</button>
        {{ Form::close() }}
    @endif
@stop