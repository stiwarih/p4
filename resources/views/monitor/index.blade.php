@extends('layouts.master')

@section('title')
    All Code Entries
@stop

@section('content')

    <h1>All Branch Entries</h1>

    @foreach($branch_names as $branch_name)
        <div>
            <h2>{{ $branch_name->branch_name }}</h2>
            <a href='/monitor/edit/{{$branch_name->id}}'>Edit</a><br>
            <img src='{{ $branch_name->branch_name }}'>
        </div>
    @endforeach

@stop
