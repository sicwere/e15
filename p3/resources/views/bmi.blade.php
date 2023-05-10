@extends('layouts/main')

@section('title')
BMI Calculator
@endsection

@section('head')
<style>
footer {
    margin-top: 75px;
}

span.result {
    text-decoration: underline;
}

button {
    background-color: #24a0ed;
}

.results button {
    margin-top: 30px;
}

ul {
    margin: auto;
    list-style: none;
    color: red;
    width: fit-content;
    padding: 10px;
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
BMI Calculator
@endsection

@section('content')
<form method="GET" action="/search">
    <div class="row">
        <label for="height" class="cell">Enter height (in meters or inches):</label>
        <input type="number" class="cell" id="height" name="height" step="0.01" value="{{ $height }}">
    </div>
    <div class="row">
        <label for="weight" class="cell">Enter weight (in kilograms or pounds):</label>
        <input type="number" class="cell" id="weight" name="weight" step="0.01" value="{{ $weight }}">
    </div>
    <div class="row">
        <label class="cell">
            Standard: <input type="radio" name="units" value="Standard"
                {{ ($units == 'Standard' or is_null($units)) ? 'checked' : '' }}></input>
        </label>
        <label class="cell">
            Metric: <input type="radio" name="units" value="Metric" {{ $units == 'Metric' ? 'checked' : '' }}></input>
        </label>
    </div>
    <div class="row">
        <label for="categories" class="cell">Show category:</label>
        <input type="checkbox" name="categories" {{ $categories ? 'checked' : '' }}></input>
    </div>
    <button type=" submit">Calculate</button>
</form>

<div class="results">
    @if(isset($bmi))
    <span>Your Body Mass Index is <span class="result">{{ $bmi }}</span>.</span>
    @if(isset($category))
    <span>This is considered <span class="result">{{ $category }}</span>.</span>
    @endif
    <form method="GET" action="/save">
        <input type="hidden" name="bmi" value="{{ $bmi }}">
        <input type="hidden" name="weight" value="{{ $weight }}">;
        <input type="hidden" name="height" value="{{ $height }}">
        <input type="hidden" name="units" value="{{ $units }}">
        <button type=" submit">Save</button>
    </form>
    @endif
</div>

@if(count($errors) > 0)
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

@endsection