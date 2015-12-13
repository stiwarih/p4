@extends('layouts.master')

@section('title')
    Edit Test Run
@stop


@section('content')

    <h1>Edit Test Details</h1>

    @include('errors')
    <h3>
        Tester : {{($test->exists == false)?'':$user_names[$test->tester_id]}}
    </h3>
    <form method='POST' action='/monitor/createupdatetest'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $test->id }}'>

        <div class='form-group'>
            <label>* Passed:</label>
            <select name='passed' id='passed'>
                {{ $passed_val = ($test->passed == 1) ? 'selected' : '' }}
                {{ $passed_noval = ($test->passed == 0) ? 'selected': '' }}
                <option value='1' {{ $passed_val }}> Yes </option>
                <option value='0' {{ $passed_noval }}> No </option>
            </select>
        </div>

        <div class='form-group'>
            <label for='merged'>Merged up:</label>
            <select name='merged' id='merged'>
                {{ $merged_val = ($test->merged_up_to_master == 1) ? 'selected' : '' }}
                {{ $merged_noval = ($test->merged_up_to_master == 0) ? 'selected': '' }}
                <option value='1' {{ $merged_val }}> Yes </option>
                <option value='0' {{ $merged_noval }}> No </option>
            </select>
        </div>

        <div class='form-group'>
            <label for='comments'>Comments:</label>
            <input
                type='text'
                id='comments'
                name="comments"
                value='{{$test->comments}}'
                >
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <nav>
        <ul>
            <li><a href='/monitor/createupdatecode/{{\Session::get('code_id')}}'><<<=Go back to Code Details</a></li>
        </ul>
    </nav>

@stop
