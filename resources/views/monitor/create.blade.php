@extends('layouts.master')

@section('title')
    Create Code Entry
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href="/css/monitor/create.css" type='text/css' rel='stylesheet'> --}}
@stop



@section('content')

    <h1>Add a new Code Entry</h1>

    @include('errors')

    <form method='POST' action='/monitor/create'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>* Branch Name:</label>
            <input
                type='text'
                id='branch_name'
                name='branch_name'
                value='{{ old('branch_name','feature_10') }}'
            >
        </div>

        <div class='form-group'>
            <label for='last_sha'>* Last Sha:</label>
            <input
                type='text'
                id='last_sha'
                name="last_sha"
                value='{{ old('last_sha','A1B1C1D1E1F10') }}'
                >
        </div>

        <div class='form-group'>
            <label for='comments'>Comments:</label>
            <input
                type='text'
                id='comments'
                name="comments"
                value='{{ old('comments','This is comment for feature 10') }}'
                >
        </div>

        <button type="submit" class="btn btn-primary">Add Code Entry</button>
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src="/js/monitor/create.js"></script> --}}
@stop
