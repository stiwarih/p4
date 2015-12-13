<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Code Quality Monitor' --}}
        @yield('title','Code Quality Monitor')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>

    <link href='/css/monitor.css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    @if(\Session::has('flash_message'))
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif

    <header>
        <a href='/'>
        <img
        src='http://p4.stiwari.me/images/project-quality.png'
        style='width:120px'
        alt='Code Quality Monitor Logo'>
        </a>
    </header>

    <nav>
        <ul>
            @if(Auth::check())
                <li><a href='/monitor'>Home</a></li>
                <li><a href='/monitor/create'>Add a code branch for Qualification</a></li>
                <li><a href='/logout'>Log out</a></li>
            @else
                <li><a href='/'>Home</a></li>
                <li><a href='/login'>Log in</a></li>
                <li><a href='/register'>Register</a></li>
            @endif
        </ul>
    </nav>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }} &nbsp;&nbsp;
        <a href='https://github.com/stiwarih/p4' class='fa fa-github' target='_blank'> View on Github</a> &nbsp;&nbsp;
        <a href='http://p4.stiwari.me/' class='fa fa-link' target='_blank'> View Live</a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
