@extends('layouts.master')

@section('title')
    Edit Code Entry
@stop


@section('content')

    <h1>Edit Code Details</h1>

    @include('errors')
    <h3>
    Developer : {{$user_names[$code->developer]}}
    </h3>
    <div>

    <ul>
        <li><a href='/input?code={{$code->id}}&type=1&id={{$code->approval_id}}'>{{($code->approval_id > 0)? 'Approved': 'Not Approved'}}</a></li>
        <li><a href='/input?code={{$code->id}}&type=2&id={{$code->test_run_id}}'>{{($code->test_run_id > 0)? 'Tested': 'Not Tested'}}</a><br></li>
    </ul>
    </div>
    <form method='POST' action='/monitor/createupdatecode'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $code->id }}'>
        <div class='form-group'>
            <label>* Branch Name:</label>
            <input
                type='text'
                id='branch_name'
                name='branch_name'
                value='{{$code->branch_name}}'
            >
        </div>

        <div class='form-group'>
            <label for='last_sha'>* Last Sha:</label>
            <input
                type='text'
                id='last_sha'
                name="last_sha"
                value='{{$code->last_sha}}'
                >
        </div>

        <div class='form-group'>
            <label for='comments'>Comments:</label>
            <input
                type='text'
                id='comments'
                name="comments"
                value='{{$code->comments}}'
                >
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

@stop
