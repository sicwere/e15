@extends('layouts/main')

@section('title')
BMI Calculator
@endsection

@section('head')
<style>
body {
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif;
}

h1,
footer,
.results {
    text-align: center;
}

footer {
    margin-top: 75px;
}

form {
    margin: auto;
    display: table;
    border-collapse: separate;
    border-spacing: 55px;
}

.row {
    display: table-row;
}

.cell {
    display: table-cell;
    padding: 5px;
}

span {
    text-align: center;
}

span.result {
    text-decoration: underline;
}

input[type=number] {
    font-size: 18px;
}

button {
    background-color: #24a0ed;
    color: white;
    width: 200px;
    height: 60px;
    font-size: 20px;
}

ul {
    margin: auto;
    list-style: none;
    background-color: red;
    width: fit-content;
    padding: 10px;
}
</style>
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
    @endif
    @if(isset($category))
    <span>This is considered <span class="result">{{ $category }}</span>.</span>
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

@section('copyright')
<div>
    &copy; Scott Ferguson
</div>
@endsection