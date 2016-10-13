<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <meta name="csrf-token" content="{!! Session::token() !!}">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">

                <!-- Left Side Of Navbar -->
                <nav class="navbar navbar-light bg-faded">
                  <div class="container">

                  <a class="navbar-brand" href="{{ url('/') }}">
                      Collections
                  </a>
                  <div class="nav navbar-nav">
                    <a class="nav-item nav-link active" href="{{ URL::route('home') }}">Home</a>
                    <a class="nav-item nav-link" href="{{ URL::route('create_a_collection') }}">Create a collection</a>
                    <a class="nav-item nav-link" href="{{ URL::route('my_collections') }}">My collections</a>
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @else
                        <a class="nav-item nav-link" href="{{ url('/logout') }}">Logout</a>
                    @endif
                  </div>
                </div>
                </nav>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('footer-scripts')
</body>
</html>
