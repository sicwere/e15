@extends('layouts/main')

@section('title')
Register for the BMI Calculator
@endsection

@section('head')
<style>
nav {
    text-align: center;
    font-size: 20px;
    font-style: italic;
}

nav a {
    font-style: normal;
    text-decoration: none;
}

button {
    background-color: green;
}
</style>
@endsection

@section('greeting')

@endsection

@section('heading')
Register for the BMI Calculator
@endsection

@section('content')
<nav>Already have an account? <a href='/login'>Login here...</a></nav>

<form method='POST' action='/register'>
    {{ csrf_field() }}
    <div class="row">
        <label for='name' class="cell">Name:</label>
        <input id='name' type='text' name='name' value="{{ old('name') }}" autofocus class="cell" size="25">
        @if($errors->get('name'))
        <span class="cell error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="row">
        <label for='email' class="cell">E-Mail Address:</label>
        <input id='email' type='email' name='email' value="{{ old('email') }}" class="cell" size="25">
        @if($errors->get('email'))
        <span class="cell error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="row">
        <label for='password' class="cell">Password (min: 8):</label>
        <input id='password' type='password' name='password' class="cell" size="25">
        @if($errors->get('password'))
        <span class="cell error">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="row">
        <label for='password-confirm' class="cell">Confirm Password:</label>
        <input id='password-confirm' type='password' name='password_confirmation' class="cell" size="25">
    </div>
    <button type='submit' class='btn btn-primary'>Register</button>
</form>
@endsection