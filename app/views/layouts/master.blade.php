<html>
    <head>
        <meta charset="utf-8">
        <title>Done List</title>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            @if(Auth::check())
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ URL::route('posts.create') }}">Create</a></li>
                        </ul>
                    </div>
                </nav>
            @endif

            @yield('content')
        </div>
    </body>
</html>