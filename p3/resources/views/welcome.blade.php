@extends('layouts/main')

@section('title')
BMI Calculator Home Page
@endsection

@section('head')
<style>
ul {
    margin: auto;
    list-style: none;
    width: fit-content;
    padding: 10px;
}

li {
    display: inline-block;
    margin: 50px;
}

ul a {
    text-decoration: none;
    font-size: 25px;
}
</style>
@endsection

@section('greeting')
<span class="greeting">
    Hello, {{ Auth::user()->name }}!
</span>
<form method='POST' id='logout' class="logout" action='/logout'>
    {{ csrf_field() }}
    <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
</form>
@endsection

@section('heading')
Welcome to the BMI Calculator
@endsection

@section('content')
<ul>
    <li><a href="bmi">Calculate BMI</a></li>
    <li><a href="history">View Previous BMIs</a></li>
    <li><a href="predict">Project Future BMI</a></li>
</ul>
@endsection