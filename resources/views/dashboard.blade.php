<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Water Refilling Station</title>
    <link rel="shortcut icon" href="/images/front-logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
            background-image: url('{{ asset('../images/bg.jpg') }}');
            background-size: cover;
            /* Adjust as needed */
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Ensures the background stays fixed while scrolling */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
        }

    </style>
</head>

<body>
    <br>


    <!--- Center ----->
    <center>
        <div class="col-md-6" style="margin-top: 10%;">
            <div class="card border">
                <div class="card-body">
                    <br>
                    <h2>Welcome to Municipality of <strong>{{ auth()->user()->municipality }}</strong></h2>
                    <br><br><br>
                    <p id="currentTime"></p><br><br>

                    @if (Route::has('login'))
                    <div>
                        @auth
                        @if (Auth::user()->type == 'user')
                        <a href="/water-refilling/products/{{ auth()->user()->municipality }}" class="btn btn-dark">FIND STATIONS</a>
                        <br>
                        <a href="/customer/home" class="btn btn-secondary mt-2">HOME</a>
                        @elseif (Auth::user()->type == 'admin')
                        <a href="{{ url('/admin/home') }}" class="btn btn-dark">ADMIN
                            DASHBOARD</a>
                        @elseif (Auth::user()->type == 'WRF')
                        <a href="{{ url('/subscribers/home') }}" class="btn btn-dark">SUBSCRIBERS
                            DASHBOARD</a>
                        @else
                        <a href="{{ url('/product') }}" class="btn btn-dark">WAITING FOR APPROVAL (PROCEED AS CUSTOMER?)</a>
                        @endif
                        @else
                        <a href="{{ url('/product/{id}') }}" class="btn btn-dark">ENTER</a>
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>


    </center>

    <script src="{{ asset('script.js') }}"></script>
    </div>
</body>

</html>
