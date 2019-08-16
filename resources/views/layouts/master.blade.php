<!DOCTYPE html>
<html>
    <head>
      <title>@yield('title')</title>
      <meta charset="utf-8">
      <!-- Boostrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{secure_asset('css/wp.css')}}">
    </head>
    
    <body>
        <!-- NavBar-->
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <a class="navbar-brand ml-4" href="#">PostNow</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link mr-5" href="#">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="#">Friends</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link mr-5" href="#">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
         @yield('content')
    </body>
</html>