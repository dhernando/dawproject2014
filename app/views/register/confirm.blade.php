@extends('layouts.master')
 
@section('title') Register @stop
 
@section('content')
 
<div class='col-lg-4 col-lg-offset-4'>
 
    <h1><i class='fa fa-user'></i> Register</h1>
 
    <div>Thank You! A confirmation email has been sent to your email, please click on the confirmation link to activate your account.</div>

    {{ HTML::link('/', 'Return home') }}
 
</div>
 
@stop