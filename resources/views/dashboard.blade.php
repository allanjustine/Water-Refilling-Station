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
            /* Set your desired text color */
            font-weight: bold;
            /* Set other styles as needed */
        }

        body {
            background-image: url('{{ asset('../images/3.jpg') }}');
            background-size: cover;
            /* Adjust as needed */
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Ensures the background stays fixed while scrolling */
        }
    </style>
</head>

<body>
    <br>


    <!--- Center ----->
    <center class="nems">
        <br>
        <img src="{{ asset('../images/wrs.jpeg') }}" width="250px" class="circle-logo">
        <br><br><br><br><br>
        <p id="currentTime"></p><br><br>

        @if (Route::has('login'))
            <div>
                @auth
                    @if (Auth::user()->type == 'user')
                        <a href="{{ url('/water-refilling') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5">FIND STATIONS</a>
                    @elseif (Auth::user()->type == 'admin')
                        <a href="{{ url('/admin/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5">ADMIN
                            DASHBOARD</a>
                    @elseif (Auth::user()->type == 'WRF')
                        <a href="{{ url('/subscribers/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5">SUBSCRIBERS
                            DASHBOARD</a>
                    @else
                        <a href="{{ url('/product') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5">WAITING FOR APPROVAL (PROCEED AS CUSTOMER?)</a>
                    @endif
                @else
                    <a href="{{ url('/product/{id}') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bn5">ENTER</a>
                @endauth
            </div>
        @endif


    </center>

    <script src="{{ asset('script.js') }}"></script>
    </div>
</body>

</html>
