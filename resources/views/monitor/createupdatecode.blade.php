@extends('layouts.master')

@section('title')
    Edit Code Entry
@stop


@section('content')

    <h1>Edit</h1>

    @include('errors')

    <form method='POST' action='/monitor/createupdatecode'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $branch_name->id }}'>

        <div class='form-group'>
            <label>* Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{$book->title}}'
            >
        </div>

        <div class='form-group'>
            <label for='author'>* Author:</label>
            <select name='author' id='author'>
                @foreach($authors_for_dropdown as $author_id => $author_name)

                    {{ $selected = ($author_id == $book->author->id) ? 'selected' : '' }}

                    <option value='{{ $author_id }}' {{ $selected }}> {{ $author_name }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='title'>* Cover (URL):</label>
            <input
                type='text'
                id='cover'
                name="cover"
                value='{{$book->cover}}'
                >
        </div>

        <div class='form-group'>
            <label for='Published'>Published (YYYY):</label>
            <input
                type='text'
                id='published'
                name="published"
                value='{{$book->published}}'
                >
        </div>

        <div class='form-group'>
            <label for='title'>* URL To purchase this book:</label>
            <input
                type='text'
                id='purchase_link'
                name='purchase_link'
                value='{{$book->purchase_link}}'
                >
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

@stop
