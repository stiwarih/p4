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
            <h3><a href='/monitor/createupdatecode/{{$code->id}}'>{{ $code->branch_name }} | Edit</a></h3>
            <div>
            <ul>
                <li>Developer:[{{$user_names[$code->developer]}}]</li>
                <li><a href='/input?code={{$code->id}}&type=1&id={{$code->approval_id}}'>{{($code->approval_id > 0)? 'Approved': 'Not Approved'}}</a></li>
                <li><a href='/input?code={{$code->id}}&type=2&id={{$code->test_run_id}}'>{{($code->test_run_id > 0)? 'Tested': 'Not Tested'}}</a><br></li>
                {{--    <li><a href='/monitor/createupdateapproval/{{$code->approval_id}}'>Aprroval</a></li>    --}}
                {{--    <li><a href='/monitor/createupdatetest/{{$code->test_run_id}}'>Tested</a><br></li>  --}}
            </ul>
            </div>
        </div>
    @endforeach

@stop
