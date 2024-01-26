<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>
        Sign In | Water Refilling Station
    </title>

    <link rel="stylesheet" media="screen"
        href="https://cdn.dribbble.com/assets/auth-261cc5937a81a31940e7af7d61ac4b68859616bb7c5fb5696fb1555548f49f85.css">

    <meta name="mixpanel-controller" content="sessions">

    <meta name="mixpanel-action" content="new">

    <style>
        .bn632-hover {
            width: 160px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            margin: 20px;
            height: 55px;
            text-align: center;
            border: none;
            background-size: 300% 100%;
            border-radius: 50px;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .bn632-hover:hover {
            background-position: 100% 0;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .bn632-hover:focus {
            outline: none;
        }

        .bn632-hover.bn19 {
            background-image: linear-gradient(to right,
                    #f5ce62,
                    #e43603,
                    #fa7199,
                    #e85a19);
            box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75);
        }

        .square-logo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        h2 {
            text-decoration: none;
        }

        .auth-card-container {
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .text-center {
            text-align: center;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }


        .button1 {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border: 2px solid #3498db;
            color: #3498db;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }


        .button1:hover {
            background-color: green;
            color: #fff;
        }

        .center-container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 7vh;
        }

        .alert-success {
            background: rgb(44, 152, 44);
            padding: 10px 10px;
            color: white;
            font-size: 18px;
        }

        .alert-danger {
            background: rgb(188, 38, 38);
            padding: 10px 10px;
            color: white;
            font-size: 18px;
        }
    </style>

<body class="logged-out not-pro not-player not-self not-team not-on-team  sign-in">

    <div id="main-container">
        <section class="auth-sidebar">
            <div class="auth-sidebar-content">

                <!--    <a href="/" class="auth-sidebar-logo">
                  <svg xmlns="http://www.w3.org/2000/svg" width="76" height="30" viewBox="0 0 210 59" fill="none" class="fill-current">
                  <h2 style="text-decoration: none;">Sign in to Water Refilling Station</h2>
                    </svg>
                </a>
            --->

                <img src="{{ asset('../images/wa.png') }}">
                <a class="auth-sidebar-credit" href="/">
                    @Group 5
                </a>
            </div>
        </section>


        <div class="auth-content">

            @if (session('loginM'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('loginM') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('disableError'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ session('disableError') }}
                    <a href="/subscription/renewal">Renew</a>
                </div>
            @endif
            <div class="auth-card-container">
                <img src="{{ asset('../images/wrs.jpeg') }}" class="square-logo">
                <div class="auth-connections">
                    <div id="g_id_onload" data-ux_mode="redirect"></div>
                </div>
                <div class="auth-form sign-in-form">

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6 input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">

                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <input class="btn2 btn2--large btn2--full-width margin-t-20"
                                                    type="submit" value="{{ __('Login') }}" tabindex="3"
                                                    data-cypress="submit-sign-in-btn">
                                            </div>
                                        </div>

                                        <div class="text-center mx-auto">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"
                                                    style="color: blue; text-decoration: underline; display: block; margin-top: 10px;">
                                                    <br><b>{{ __('Forgot Your Password?') }}</b>
                                                </a>
                                            @endif
                                        </div>

                                        <hr>

                                        <div class="center-container1">
                                            <a class="button1" role="button" href="{{ url('/register') }}">
                                                <b>Create new account</b>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <br>
            <div>
                <a href="{{ url('/register1') }}">
                    <b>Subscribes here!</b>
                </a>
                if you are the owner of the station
            </div>

        </div> <!--- LAST OF auth-card-container------>


    </div>
</body>

</html>
