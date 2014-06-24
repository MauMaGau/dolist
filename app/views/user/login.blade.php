@extends('layouts.master')

@section('content')

    {{ $errors->first('authenticated') }}

    {{ Form::open(['url'=>'login']) }}

        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email') }}
        {{ $errors->first('email') }}

        {{ Form::label('password', 'Password:' ) }}
        {{ Form::password('password') }}
        {{ $errors->first('password') }}

        {{ Form::submit('Log in') }}

    {{ Form::close() }}

@stop