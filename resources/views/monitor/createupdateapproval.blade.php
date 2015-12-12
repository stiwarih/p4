@extends('layouts.master')

@section('title')
    Edit Approval
@stop


@section('content')

    <h1>Edit Approval</h1>

    @include('errors')

    <form method='POST' action='/monitor/createupdateapproval'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $approval->id }}'>

        <div class='form-group'>
            <label for='comments'>Comments:</label>
            <input
                type='text'
                id='comments'
                name="comments"
                value='{{$approval->comments}}'
                >
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

@stop
