<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>SRP</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
                /*
        * Globals
        */


        /* Custom default button */
        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
        color: #333;
        text-shadow: none; /* Prevent inheritance from `body` */
        }


        /*
        * Base structure
        */

        body {
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
        }

        .cover-container {
        max-width: 42em;
        }


        /*
        * Header
        */

        .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link + .nav-link {
        margin-left: 1rem;
        }

        .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
        }
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
         user-select: none;
        }

        @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        }
    </style>
  </head>

  <body class="d-flex h-100 text-center text-white bg-dark">
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
          <div>
            <h3 class="float-md-start mb-0">SRP</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
              <a class="nav-link" href="#">Contact</a>
            </nav>
          </div>
        </header>
      
        <main class="px-3">
          <h1>Hello!</h1>
          <p class="lead">Welcome to the Student Registration Portal</p>
          <p class="lead">
            @if (Route::has('login'))
            @auth
            <p style="font-size: 30px">You are already logged in!</p><a href="{{ url('/home') }}" class="btn btn-lg btn-secondary fw-bold border-white bg-white mt-3">HOME</a>
              @else
            <a href="{{ route('login') }}" class="btn btn-lg btn-secondary fw-bold border-white bg-white mt-3">LOGIN</a>
            <p>or</p>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-md btn-secondary fw-bold border-white text-white">REGISTER</a>
            @endif
          </p>
          @endauth
          @endif
        </main>
      
        <footer class="mt-auto text-white-50">
          <p>@meh</p>
        </footer>
      </div>
    </body>
</html>
