<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Refilling Philippines | Register</title>
    <link rel="shortcut icon" href="/images/front-logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
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

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h2 style="font-family: cursive, sans-serif; color:rgb(68, 194, 243);"><strong>Water Refilling Station</strong></h2>
            </a>
            <div class="justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn bg-primary p-2 text-white" href="/login">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="background-image d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="container d-flex justify-content-center" style="margin-top: 8%;">
                <div class="card text-white p-4" style="width: 100%; max-width: 400px;">
                    <div class="text-center">
                        <h3><strong>Register</strong></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name"><strong>Name</strong></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>Email address</strong></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone"><strong>Phone number (9XXXXXXXXX)</strong></label>
                                <input type="number" class="form-control" id="phone" placeholder="(9XXXXXXXXX)" name="phone" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="municipality"><strong>Municipality</strong></label>
                                <select name="municipality" id="municipality" class="form-control @error('municipality') is-invalid @enderror">
                                    <option selected hidden>Select your Municipality
                                    </option>
                                    <option disabled>Select your Municipality</option>
                                    <optgroup label="MUNICIPALITY">
                                        <option value="Abuyog">Abuyog</option>
                                        <option value="Javier">Javier</option>
                                        <option value="Macarthur">Macarthur</option>
                                        <option value="Mahaplag">Mahaplag</option>
                                    </optgroup>
                                </select>
                                @error('municipality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address"><strong>Address</strong></label>
                                <input type="text" class="form-control" id="address" name="address" required>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><strong>Password</strong></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><strong>Confirm password</strong></label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
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
