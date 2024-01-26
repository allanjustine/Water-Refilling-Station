@extends('layouts.user.app')

@section('content')
    <html>

    <head>
        <style>
            .auth-card-container {
                max-width: 400px;
                margin: auto;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin-top: 20px;
                background-image: url('{{ asset('../images/aw.png') }}');
                background-size: cover;
            }

            .card-header {
                background-color: transparent;
                /* Set the background color of the card header to transparent */
                border: none;
                /* Remove the border of the card header */
            }

            body {
                background-image: url('{{ asset('../images/light.png') }}');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
            }
        </style>
    </head>

    <body>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card auth-card-container">
                        <br>
                        <div class="card-header" style="color: black;"><b>{{ __('CREATE ACCOUNT TO SUBSCRIBERS') }}</b></div>
                        <br>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register1') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end"
                                        style="color: black;"><b>{{ __('NAME') }}</b></label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end"
                                        style="color: black;"><b>{{ __('EMAIL') }}</b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end"
                                        style="color: black;"><b>{{ __('PHONE NUMBER') }}</b></label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="municipality" class="col-md-4 col-form-label text-md-end"
                                        style="color: black;"><b>{{ __('MUNICIPALITY') }}</b></label>

                                    <div class="col-md-6">
                                        <select name="municipality" id="municipality"
                                            class="form-select @error('municipality') is-invalid @enderror">
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
                                </div>
                                <div class="row mb-3">
                                    <label for="station" class="col-md-4 col-form-label text-md-end"
                                        style="color: black;"><b>{{ __('STATION') }}</b></label>

                                    <div class="col-md-6">
                                        <input type="text" name="station"
                                        class="form-control @error('station') is-invalid @enderror" required>
                                    </div>

                                    @error('station')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"
                                style="color: black;"><b>{{ __('PASSWORD') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add this to your registration form -->
                        <div class="row mb-3">
                            <label for="subscription_type" class="col-md-4 col-form-label text-md-end"
                                style="color: black;"><b>{{ __('Subscription Type') }}</b></label>

                            <div class="col-md-6">
                                <select id="subscription_type" class="form-select" name="subscription_type" required>
                                    <option value="1_month">1 Month</option>
                                    <option value="1_year">1 Year</option>
                                </select>

                                @error('subscription_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <br><br><br><br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>
@endsection
