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
                            <a class="nav-item nav-link" href="#">Mixes</a>
                        </div>
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="#">Login</a>
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
                <p>&copy; Company 2017</p>
            </div>
        </footer>
    </body>
</html>
