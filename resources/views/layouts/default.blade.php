<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{config('app.name')}} - @yield('title')</title>
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
                    <div class="collapse navbar-collapse justify-content-between" id="navbar">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="#">News</a>
                            <a class="nav-item nav-link" href="{{route('mixes.index')}}">Mixes</a>
                            <a class="nav-item nav-link" href="{{route('mixes.create')}}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="navbar-nav">
                            @if (Auth::check())
                                <a class="nav-item nav-link" href="{{route('users.show', ['id' => Auth::user()->id])}}">
                                    {{Auth::user()->name}}
                                </a>
                                <a class="nav-item nav-link" href="{{route('auth.logout')}}">Logout</a>
                            @else
                                <a class="nav-item nav-link" href="{{route('auth.login')}}">Login</a>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            @yield('main')
        </main>
        <footer>
            <div class="container">
                <p>
                    &copy; 2017 -
                    <a href="mailto:p.spek@tyil.work">
                        Patrick Spek
                    </a>
                </p>
            </div>
        </footer>
    </body>
</html>
