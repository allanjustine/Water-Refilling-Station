<html lang="en"><head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>
         Sign In | Water Refilling Station
    </title>
    
    <link rel="stylesheet" media="screen" href="https://cdn.dribbble.com/assets/auth-261cc5937a81a31940e7af7d61ac4b68859616bb7c5fb5696fb1555548f49f85.css">

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
            text-align:center;
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
            background-image: linear-gradient(
                to right,
                #f5ce62,
                #e43603,
                #fa7199,
                #e85a19
            );
            box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75);
            }

            .circle-logo {
                border-radius: 50%;
            }

            h2 {
                text-decoration: none;
            }
            

    </style>

<body class="logged-out not-pro not-player not-self not-team not-on-team  sign-in">
    
    <div id="main-container">
          <section class="auth-sidebar">
            <div class="auth-sidebar-content">
                <a href="/" class="auth-sidebar-logo">
                  <svg xmlns="http://www.w3.org/2000/svg" width="76" height="30" viewBox="0 0 210 59" fill="none" class="fill-current">
                  <h2 style="text-decoration: none;">Sign in to Water Refilling Station</h2>
                    </svg>

                </a>
                <video playsinline="" class="auth-sidebar-video" autoplay="" loop="" muted="" src="{{ asset('../images/vids.mp4') }}">
                </video>
                <a class="auth-sidebar-credit">
                  @Group 5
                </a>
            </div>
          </section>
      

<div class="auth-content">
  <img src="{{ asset('../images/wrs.jpeg') }}" width="150px" class="circle-logo">
            <br><br><br>
  <div class="auth-connections">
      <div id="g_id_onload" data-ux_mode="redirect"></div>

        </div>

        <!----<hr class="divider sign-in">----->
        
        <div class="auth-form sign-in-form">
            
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            
                            <div class="col-md-6 input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <button class="btn btn-outline-secondary" type="button" id="password-toggle-btn">
                                    Show Password<i class="bi bi-eye"></i>
                                </button>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var passwordInput = document.getElementById('password');
                                var passwordToggleBtn = document.getElementById('password-toggle-btn');

                                passwordToggleBtn.addEventListener('mousedown', function () {
                                    passwordInput.type = 'text';
                                });

                                passwordToggleBtn.addEventListener('mouseup', function () {
                                    passwordInput.type = 'password';
                                });

                                passwordToggleBtn.addEventListener('mouseout', function () {
                                    passwordInput.type = 'password';
                                });
                            });
                        </script>


                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    

                                        @if (Route::has('password.request'))
                                            <a class="bn632-hover bn19" href="{{ route('password.request') }}">
                                                <br>{{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif

                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input class="btn2 btn2--large btn2--full-width margin-t-20" type="submit" value="{{ __('Login') }}" tabindex="3" data-cypress="submit-sign-in-btn">


                            </div>
                        </div>
                    </form>
                </div>
        
            </div>
            </div>

        </main>
      </section>
    </div>
</body>
</html>


