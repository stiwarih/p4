@extends('layouts.master')

@section('title')
    Edit Code Entry
@stop


@section('content')

    <h1>Edit</h1>

    @include('errors')

    <form method='POST' action='/monitor/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $code->id }}'>

        <div class='form-group'>
            <label>* Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{$code->branch_name}}'
            >
        </div>

        <div class='form-group'>
            <label for='title'>* Cover (URL):</label>
            <input
                type='text'
                id='cover'
                name="cover"
                value='{{$code->sha1}}'
                >
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

@stop
