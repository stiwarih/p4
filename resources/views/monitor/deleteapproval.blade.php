@extends('layouts.master')

@section('title')
    Delete Approval
@stop


@section('content')

    <h1>Delete Approval</h1>

    <p>
        Are you sure you want to delete <em>'{{$approval->comments}}'</em>?
    </p>

    <p>
        <a href='/monitor/deleteapproval/{{$approval->id}}'>Yes...</a>
    </p>

@stop
