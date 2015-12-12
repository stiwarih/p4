@extends('layouts.master')

@section('title')
    Edit Code Entry
@stop


@section('content')

    <h1>Edit</h1>

    @include('errors')

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
            <label for='last_sha'>* Last Sha (URL):</label>
            <input
                type='text'
                id='last_sha'
                name="last_sha"
                value='{{$code->last_sha}}'
                >
        </div>

        <div class='form-group'>
            <label for='comments'>* Last Sha (URL):</label>
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
