@extends('layouts.master')
<style>
li {
    display: inline;
}
</style>
@section('title')
    All Code Entries
@stop

@section('content')

    <h1>All Code Entries</h1>

    @foreach($codes as $code)
        <div>
            <h2><a href='/monitor/createupdatecode/{{$code->id}}'>{{ $code->branch_name }}</a></h2>
            <div>
            <ul>
                <li>Approved</li>
            </ul>
            <ul>
                <li><img src='{{ $code->last_sha }}'><a href='/monitor/createupdatecode/{{$code->approval_id}}'>Aprroval</a></li>
                <li><a href="/html/default.asp" target="_blank">HTML</a></li>
                <li><a href="/css/default.asp" target="_blank">CSS</a></li>
                <li><a href='/monitor/createupdatecode/{{$code->id}}&testid={{$code->test_run_id}}&approvalid={{$code->approval_id}}'>Tested</a><br></li>
            </ul>
            </div>
        </div>
    @endforeach

@stop
