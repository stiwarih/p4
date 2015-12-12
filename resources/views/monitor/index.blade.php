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
                <li><a href='/monitor/createupdateapproval/{{$code->approval_id}}'>Aprroval</a></li>
                <li><a href='/monitor/createupdatetest/{{$code->test_run_id}}'>Tested</a><br></li>
            </ul>
            </div>
        </div>
    @endforeach

@stop
