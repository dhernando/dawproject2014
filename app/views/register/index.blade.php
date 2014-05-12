@extends('layouts.master')
 
@section('title') Register @stop
 
@section('content')
 
<div class='col-lg-4 col-lg-offset-4'>
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    <h1><i class='fa fa-user'></i> Register</h1>
 
    {{ Form::open(['role' => 'form', 'route' => 'register.store']) }}
 
    <div class='form-group'>
        {{ Form::label('nombre', 'Name') }}
        {{ Form::text('nombre', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('apellido', 'Last Name') }}
        {{ Form::text('apellido', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop