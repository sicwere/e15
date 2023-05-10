@extends('layouts/main')

@section('title')
Login to the BMI Calculator
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
    background-color: purple;
}
</style>
@endsection

@section('greeting')

@endsection

@section('heading')
Login to the BMI Calculator
@endsection

@section('content')
<nav>Don’t have an account? <a href='/register'>Register here...</a></nav>

<form method='POST' action='/login'>
    {{ csrf_field() }}
    <div class="row">
        <label for='email' class="cell">E-Mail Address:</label>
        <input id='email' type='email' name='email' value="{{ old('email') }}" autofocus class="cell" size="25">
        @if($errors->get('email'))
        <span class="cell error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="row">
        <label for='password' class="cell">Password:</label>
        <input id='password' type='password' name='password' class="cell" size="25">
        @if($errors->get('email'))
        <span class="cell error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="row">
        <label>
            <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
    </div>
    <button type='submit' class='btn'>Login</button>
    </a>
</form>
@endsection