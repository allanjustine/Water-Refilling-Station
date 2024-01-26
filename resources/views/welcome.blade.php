<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css1/styles.css">

        <title>Water Refilling Station</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            .user-name {
                color: #3366cc;
                font-weight: bold;
            }

            body {
                background-image: url('{{ asset("../images/3.jpg") }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }


            .button-link {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border: 2px solid #3498db;
            color: #fff;
            background-color: #3498db;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            margin-bottom: 10px;
            }


            .button-link:hover {
            background-color: #fff;
            color: #3498db;
            }



        </style>
    </head>
    <body>
            <!--- Center ----->
        <center class="nems">
            <br>
            <img src="{{ asset('../images/BORCELLE.png') }}" width="250px" class="circle-logo">
            <br><br><br>
            <!----<p id="currentTime"></p><br><br>---->

                @if (Route::has('login'))
                    <div>
                        @auth
                            @if (Auth::user()->type == 'user')
                                <a href="{{ url('/customer/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5">HOME</a>
                            @elseif (Auth::user()->type == 'admin')
                                <a href="{{ url('/admin/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5">ADMIN HOME</a>
                            @elseif (Auth::user()->type == 'WRF')
                                <a href="{{ url('/subscribers/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5"><span style="text-transform: uppercase;">{{ auth()->user()->station }}</span> HOME</a>
                            @endif
                        @else
                        <a class="button-link" href="{{ url('/register') }}">REGISTER</a>
                        <br>
                        <a class="button-link" href="{{ url('/login') }}">LOGIN</a><br><br>

                        @endauth
                    </div>
                @endif


            <!----footer----
            <footer>
                <b>Created and Design by Group 5</b>
            </footer>---->

        </center>

        <script src="{{ asset('script.js')}}"></script>
        </div>
    </body>
</html>
