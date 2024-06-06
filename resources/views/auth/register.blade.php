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
                <div class="card text-white p-4" style="width: 100%; max-width: 700px;">
                    <div class="text-center">
                        <h3><strong>Register</strong></h3>
                    </div>
                    <div class="card-body">
                        <form id="addressForm" method="POST" action="/registerAcc">
                            @csrf

                            <div class="form-group">
                                <label for="email"><strong>Email address</strong></label>
                                <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email">
                                @error('email')
                                <span class="text-danger text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name"><strong>Name</strong></label>
                                        <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name">
                                        @error('name')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone"><strong>Phone number (9XXXXXXXXX)</strong></label>
                                        <input value="{{ old('phone') }}" type="number" class="form-control" id="phone" placeholder="(9XXXXXXXXX)" name="phone">
                                        @error('phone')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="municipality"><strong>Municipality</strong></label>
                                        <select name="municipality" id="municipality" class="form-control @error('municipality') is-invalid @enderror">
                                            <option selected hidden value="">Select your Municipality
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
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="default" style="display: block;">
                                        <div class="form-group">
                                            <label for="address-default"><strong>Select Address</strong></label>
                                            <select class="form-control address-select" id="address-default" name="address" disabled>
                                                <option value="" hidden selected>Select Address</option>
                                                <option disabled>Select Address</option>
                                            </select>
                                            @error('address')
                                            <span class="text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="abuyog" style="display: none;">
                                        <div class="form-group">
                                            <label for="address-abuyog"><strong>Select Address for Abuyog</strong></label>
                                            <select class="form-control address-select" id="address-abuyog" name="address" disabled>
                                                <option value="" hidden selected>Select Address for Abuyog</option>
                                                <option value="Guintagbucan (Pob.)">Guintagbucan (Pob.)</option>
                                                <option value="Balocawehay">Balocawehay</option>
                                                <option value="Loyonsawang (Pob.)">Loyonsawang (Pob.)</option>
                                                <option value="Santo Niño (Pob.)">Santo Niño (Pob.)</option>
                                                <option value="Victory (Pob.)">Victory (Pob.)</option>
                                            </select>
                                            @error('address')
                                            <span class="text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="javier" style="display: none;">
                                        <div class="form-group">
                                            <label for="address-javier"><strong>Select Address for Javier</strong></label>
                                            <select class="form-control address-select" id="address-javier" name="address" disabled>
                                                <option value="" hidden selected>Select Address for Javier</option>
                                                <option value="Abuyogay.">Abuyogay.</option>
                                                <option value="Batug.">Batug.</option>
                                                <option value="Binulho.">Binulho.</option>
                                                <option value="Bonifacio (Pundok)">Bonifacio (Pundok)</option>
                                                <option value="Calzada.">Calzada.</option>
                                            </select>
                                            @error('address')
                                            <span class="text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="macarthur" style="display: none;">
                                        <div class="form-group">
                                            <label for="address-macarthur"><strong>Select Address for Macarthur</strong></label>
                                            <select class="form-control address-select" id="address-macarthur" name="address" disabled>
                                                <option value="" hidden selected>Select Address for Macarthur</option>
                                                <option value="Batug.">Batug.</option>
                                                <option value="Burabod.">Burabod.</option>
                                                <option value="Capudlosan.">Capudlosan.</option>
                                                <option value="Casuntingan.">Casuntingan.</option>
                                                <option value="Causwagan.">Causwagan.</option>
                                            </select>
                                            @error('address')
                                            <span class="text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="mahaplag" style="display: none;">
                                        <div class="form-group">
                                            <label for="address-mahaplag"><strong>Select Address for Mahaplag</strong></label>
                                            <select class="form-control address-select" id="address-mahaplag" name="address" disabled>
                                                <option value="" hidden selected>Select Address for Mahaplag</option>
                                                <option value="Campin.">Campin.</option>
                                                <option value="Cuatro De Agosto.">Cuatro De Agosto.</option>
                                                <option value="Hilusig.">Hilusig.</option>
                                                <option value="Himamara.">Himamara.</option>
                                                <option value="Hinaguimitan.">Hinaguimitan.</option>
                                            </select>
                                            @error('address')
                                            <span class="text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password"><strong>Password</strong></label>
                                        <input value="{{ old('password') }}" type="password" class="form-control" id="password" name="password">
                                        @error('password')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group">
                                        <label for="password_confirmation"><strong>Confirm password</strong></label>
                                        <input value="{{ old('password_confirmation') }}" type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                        @error('password_confirmation')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="checkbox" onclick="myFunction()">
                            <label for="">Show Password</label>

                            <script>
                                function myFunction() {
                                    var x = document.getElementById("password");
                                    var y = document.getElementById("password_confirmation");
                                    if (x.type === "password" && y.type === "password") {
                                        x.type = "text";
                                        y.type = "text";
                                    } else {
                                        x.type = "password";
                                        y.type = "password";
                                    }
                                }

                            </script>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const municipalitySelect = document.querySelector('select[name="municipality"]');
            const abuyogSelect = document.getElementById('abuyog');
            const javierSelect = document.getElementById('javier');
            const macarthurSelect = document.getElementById('macarthur');
            const mahaplagSelect = document.getElementById('mahaplag');
            const defaultSelect = document.querySelector('.default');
            const addressForm = document.getElementById('addressForm');

            municipalitySelect.addEventListener('change', function() {
                const selectedValue = this.value;

                abuyogSelect.style.display = 'none';
                javierSelect.style.display = 'none';
                macarthurSelect.style.display = 'none';
                mahaplagSelect.style.display = 'none';
                defaultSelect.style.display = 'none';

                if (selectedValue === 'Abuyog') {
                    abuyogSelect.style.display = 'block';
                    abuyogSelect.querySelector('.address-select').disabled = false;
                } else if (selectedValue === 'Javier') {
                    javierSelect.style.display = 'block';
                    javierSelect.querySelector('.address-select').disabled = false;
                } else if (selectedValue === 'Macarthur') {
                    macarthurSelect.style.display = 'block';
                    macarthurSelect.querySelector('.address-select').disabled = false;
                } else if (selectedValue === 'Mahaplag') {
                    mahaplagSelect.style.display = 'block';
                    mahaplagSelect.querySelector('.address-select').disabled = false;
                } else {
                    defaultSelect.style.display = 'block';
                    defaultSelect.querySelector('.address-select').disabled = false;
                }
            });

            addressForm.addEventListener('submit', function(event) {
                const visibleSelect = document.querySelector('select.address-select:not([disabled])');
                visibleSelect.setAttribute('name', 'address');
            });
        });

    </script>
</body>
</html>
