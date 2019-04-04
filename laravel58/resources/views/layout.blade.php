<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laracasts')</title>
        <style>
            .is-danger {
                color: red;
                border-color: red;
            }
            .is-completed {
                text-decoration: line-through;
                color: gray;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="title m-b-md">
                @yield('content')
            </div>

            <div class="links">
                <a href="/">Home</a>
                <a href="/projects">Projects</a>
                <a href="/contact">Contact</a>
                <a href="/about">About</a>
            </div>
        </div>
    </body>
</html>
