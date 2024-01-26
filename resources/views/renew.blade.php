<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Renewal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Subscription Renewal
                    </div>

                    <div class="card-body">
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

                        <form action="{{ route('subscription.renewal') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subscription_type" class="form-label">Renewal Option</label>
                                <select class="form-select @error('subscription_type') is-invalid @enderror" id="subscription_type" name="subscription_type">
                                    <option value="1_month">1 Month</option>
                                    <option value="1_year">1 Year</option>
                                </select>
                                @error('subscription_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Renewal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="/login" class="mt-5 btn btn-secondary">Back to login page</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
