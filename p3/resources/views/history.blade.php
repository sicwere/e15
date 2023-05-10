@extends('layouts/main')

@section('title')
BMI History
@endsection

@section('head')
<style>
table,
th,
td {
    border: 1px solid;
}

table {
    width: 70%;
    margin-left: 15%;
    margin-right: 15%;
    border-collapse: collapse;
}

td {
    text-align: center;
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
BMI History
@endsection

@section('content')

@if(isset($flashAlert))
<div>{{ $flashAlert }}</div>
@endif

@if(isset($bmis))
{!! $chart->container() !!}
<table>
    <th>Date</th>
    <th>BMI</th>
    <th>Weight</th>
    <th>Height</th>
    <th>Delete?</th>
    @foreach($bmis as $bmi)
    <tr>
        <td>{{ $bmi->created_at->toDayDateTimeString() }}</td>
        <td>{{ $bmi->bmi }}</td>
        <td>{{ $bmi->weight }} {{  $bmi->units === 'Standard' ? 'lbs' : 'kgs'}}</td>
        <td>{{ $bmi->height }} {{  $bmi->units === 'Standard' ? 'in' : 'm'}}</td>
        </td>
        <td><a href="/delete?bmi_id={{ $bmi->id }}">X</a></td>
    </tr>
    @endforeach
</table>
@endif


@if(count($errors) > 0)
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

@endsection