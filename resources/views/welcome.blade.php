<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/p4.css">
        <link rel="stylesheet" href="/css/grid.css">
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    CharityDB
                </div>
                <hr>
                <br>
            <form class="form-horizontal" role="form" method="POST" action="#">
                    {{ csrf_field() }}
                <div class="form-group">
                    <div class="mainlinks">
                          <a href="/">Search Charities</a>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </body>
</html>
