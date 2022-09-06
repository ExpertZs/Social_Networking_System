<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Page</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
    </head>
    <div style="text-center"><h2 class="text-center">Welcome to my social network site</h2></div>
    <body class="antialiased items-center">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('auth/login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <div>
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            <br>
                            <br>
                        </div>
                    @else
                    <div>
                        <a href="{{ route('auth/login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        <br>
                        <br>
                    </div>

                    <div>
                        <a href="{{ route('auth/register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        <br>
                        <br>
                    </div>
                       
                    @endauth
                </div>
            @endif
           
        </div>
    </body>
</html>
