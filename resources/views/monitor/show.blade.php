@extends('layouts.master')

@section('title')
    Show Branch Name
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    <link href="/css/monitor/show.css" type='text/css' rel='stylesheet'>
@stop


@section('content')

    @if(!isset($branch_name))
        You have not specified a Branch Name
    @else
        <h1>Show Branch Name: {{ $branch_name }}</h1>
    @endif

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/monitor/show.js"></script>
@stop
