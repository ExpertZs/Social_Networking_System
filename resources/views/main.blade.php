<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color:#e3f2fd;">
      <div class="container">
        <a class="navbar-brand mr-auto" href="#">My Social Network</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expended="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
          
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('auth/login') }}">{{ __('Login') }}</a>
                                </li>
                           
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('auth/register') }}">{{ __('Register') }}</a>
                                </li>
                            
                        @else
                                <li class="nav-item"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>
                                </li>

                            <li class="nav-item dropdown">
                                 <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                            </li>
                        @endguest
                    </ul>
         </div>

      </div>
    </nav>
                    
                    
        <div class="container mt-5">
            @yield('content')
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
