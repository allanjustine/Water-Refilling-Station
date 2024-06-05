<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Refilling Philippines | Login</title>
    <link rel="shortcut icon" href="/images/front-logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .background-image {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
        }

        .content {
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #card-subs:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.381);
        }

        .profile-card {
            display: flex;
            align-items: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h3 {
            margin: 0;
        }

        .profile-info p {
            margin: 5px 0;
        }

    </style>
</head>
<body>
    <div class="modal fade" id="modalDevelopers" data-keyboard="false" tabindex="-1" aria-labelledby="modalDevelopersLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" style="background-image: url('/images/33.jpg'); background-position: fixed; background-repeat: no-repeat; background-size: cover;">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center text-white"><strong>Website Developers</strong></h3>
                    <br>
                    <div class="row justify-content-center">

                        <div class="col-12 text-white">
                            <div class="profile-card">
                                <img src="/images/developers/5.jpg" alt="Profile Photo" class="profile-photo">
                                <div class="profile-info">
                                    <h3><strong>Nemmar Campos</strong></h3>
                                    <p><strong>Full Stack Developer</strong></p>
                                    <p>Master's Degree in Information Technology</p>
                                </div>
                            </div>
                            <div class="profile-card">
                                <img src="/images/developers/1.jpg" alt="Profile Photo" class="profile-photo">
                                <div class="profile-info">
                                    <h3><strong>Jerone Closa</strong></h3>
                                    <p><strong>Backend Developer</strong></p>
                                    <p>Master's Degree in Information Technology</p>
                                </div>
                            </div>
                            <div class="profile-card">
                                <img src="/images/developers/2.jpg" alt="Profile Photo" class="profile-photo">
                                <div class="profile-info">
                                    <h3><strong>Luis Gabriel Petere</strong></h3>
                                    <p><strong>Senior Software Developer</strong></p>
                                    <p>Master's Degree in Information Technology</p>
                                </div>
                            </div>
                            <div class="profile-card">
                                <img src="/images/developers/3.jpg" alt="Profile Photo" class="profile-photo">
                                <div class="profile-info">
                                    <h3><strong>Mary Chris Nicolas</strong></h3>
                                    <p><strong>UI/UX Designer</strong></p>
                                    <p>Master's Degree in Information Technology</p>
                                </div>
                            </div>
                            <div class="profile-card">
                                <img src="/images/developers/4.jpg" alt="Profile Photo" class="profile-photo">
                                <div class="profile-info">
                                    <h3><strong>Joseph Balagasay</strong></h3>
                                    <p><strong>Frontend Developer</strong></p>
                                    <p>Master's Degree in Information Technology</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h3 class="text-white"><strong>Our School</strong></h3>
                        <div class="card">
                            <img class="card-img-top" style="height: 400px;" src="/images/developers/school.jpg">
                            <div class="card-body text-black">
                                <p><strong>Abuyog Community College</strong></p>
                                <p><i>Brgy. Guintagbucan, Abuyog, Leyte</i></p>
                                <p><i>School Project (CAPSTONE)</i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <a href="#" data-toggle="modal" data-target="#modalDevelopers" class="btn btn-link text-white position-absolute mb-3 ml-3" style="bottom: 0; left: 0;"><strong>Developers</strong></a>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h2 style="font-family: cursive, sans-serif; color:rgb(68, 194, 243);"><strong>Water Refilling Station</strong></h2>
            </a>
        </div>
    </nav>
    <div class="background-image d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="container d-flex justify-content-center" style="margin-top: 10%;">
                <div class="card text-white p-4" style="width: 100%; max-width: 400px;">
                    <div class="text-center">
                        <h3><strong>Login</strong></h3>

                        @if (session('loginM'))
                        <div style="font-size: 14px;" class="text-success">
                            <strong>{{ session('loginM') }}</strong>
                        </div>
                        @endif
                        @if (session('error'))
                        <div style="font-size: 14px;" class="text-danger">
                            <strong>{{ session('error') }}</strong>
                        </div>
                        @endif
                        @if (session('disableError'))
                        <div style="font-size: 14px;" class="text-danger">
                            <strong>{{ session('disableError') }}</strong>
                            <a href="/subscription/renewal">Renew</a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email"><strong>Email address</strong></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password"><strong>Password</strong></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <input type="checkbox" onclick="myFunction()">
                            <label for="">Show Password</label>

                            <script>
                                function myFunction() {
                                    var x = document.getElementById("password");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>


                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <p class="text-center mt-3">OR</p>

                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="btn btn-link text-dark text-center form-control"><b>{{ __('Forgot Your Password?') }}</b>
                            </a>
                            @endif

                            <a href="/register" class="btn btn-dark text-white text-center form-control"><b>Create an account</b>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#subscribeModal1" class="btn btn-secondary mt-2 text-white text-center form-control"><b>Subscribe an account</b>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="subscribeModal1" tabindex="-1" role="dialog" aria-labelledby="subscribeModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content p-5" style="background-image: url('/images/bg.jpg'); background-position: fixed; background-repeat: no-repeat; background-size: cover;">
                <div class="border-0">
                    <button style="right: 0; top: 0;" type="button" class="close position-absolute mt-3 mr-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="text-center mt-2">Choose Your Plan</h1>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card border" id="card-subs">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Standard</h5>
                                        <p class="card-text">₱200/Month</p>
                                        <a class="btn btn-primary" href="/subscription/1_month">
                                            Get
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border" id="card-subs">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Premium</h5>
                                        <p class="card-text">₱500/Year</p>
                                        <a class="btn btn-primary" href="/subscription/1_year">
                                            Get
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
