@extends('layouts/main')

@section('title')
Project Future BMI
@endsection

@section('head')
<style>
h2 {
    font-size: 20px;
    font-weight: normal;
}

button {
    background-color: blue;
}

ul {
    margin: auto;
    list-style: none;
    color: red;
    width: fit-content;
    padding: 10px;
}

span.result {
    text-decoration: underline;
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
Project Future BMI
@endsection

@section('content')
<h2>Project how much weight you would need to lose each month to reach a target BMI.</h2>
<form method="GET" action="/project">
    <div class="row">
        <label for="height" class="cell">Enter current height (in meters or inches):</label>
        <input type="number" class="cell" id="height" name="height" step="0.01" value="{{ $height }}">
    </div>
    <div class="row">
        <label for="weight" class="cell">Enter current weight (in kilograms or pounds):</label>
        <input type="number" class="cell" id="weight" name="weight" step="0.01" value="{{ $weight }}">
    </div>
    <div class="row">
        <label for="target" class="cell">Enter target BMI:</label>
        <input type="number" class="cell" id="target" name="target" step="0.01" value="{{ $target }}">
    </div>
    <div class="row">
        <label for="months" class="cell">Enter number of months to reach BMI:</label>
        <input type="number" class="cell" id="months" name="months" step="0.01" value="{{ $months }}">
    </div>
    <div class="row">
        <label class="cell">
            Standard: <input type="radio" name="units" value="Standard"
                {{ ($units === 'Standard' or is_null($units)) ? 'checked' : '' }}></input>
        </label>
        <label class="cell">
            Metric: <input type="radio" name="units" value="Metric" {{ $units == 'Metric' ? 'checked' : '' }}></input>
        </label>
    </div>
    <button type=" submit">Calculate</button>
</form>

<div class="results">
    @if(isset($noLossMsg))
    <span>{{ $noLossMsg }}</span>
    @elseif(isset($targetWeight))
    <span>You would need to lose <span class="result">{{ $perMonth }} {{ $measure }}</span> per month, for a total
        weight loss of <span class="result">{{ $targetWeight }} {{ $measure }}</span>.</span>
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