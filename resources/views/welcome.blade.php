<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 justify-content-center">
                        <h2>Available routes</h2>

                        <ul class="list-inline">
                            <li><a href="/read/{id}">Display posts of a certain user</a></li>
                            <li><a href="/create_post/{id}">Create a post for a certain user</a></li>
                            <li><a href="/update/{id}/{id2}">Update post of a certain user</a></li>
                            <li><a href="/delete/{id}/{id2}">Delete a post of a certain user</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
