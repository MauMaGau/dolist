<html>
    <head>
        <meta charset="utf-8">
        <title>Done List</title>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="{{ URL::to('script.js') }}" type="text/javascript" charset="utf-8" async defer></script>
    </head>
    <body>
        <div class="container">

            @if(Auth::check())
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ URL::route('posts.index') }}">All Posts</a></li>
                            <li><a href="{{ URL::route('posts.create') }}">Create</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </nav>
            @else
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ URL::route('posts.index') }}">All Posts</a></li>
                        </ul>
                    </div>
                </nav>
            @endif


            @yield('content')
        </div>
    </body>
</html>