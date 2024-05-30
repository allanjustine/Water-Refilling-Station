<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Refilling Philippines</title>
    <link rel="shortcut icon" href="/images/front-logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .background-image {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
        }

        .content {
            background: rgba(0, 0, 0, 0.6);
            padding: 2rem;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.5);
        }

        #card-subs:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.381);
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
                        <a class="nav-link btn bg-primary text-white p-2" href="/login">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="background-image d-flex justify-content-center align-items-center">
        <div class="content text-center">
            <h2 class="display-4 font-weight-bold">Water is life, and Clean water means health</h2>
            <p class="lead">Stay hydrated and drink enough water everday</p>
            <p class="lead">Buy water or Subscribe to sell water</p>
            <form class="form-inline justify-content-center">
                <a href="/register" class="btn btn-info mb-2 ml-2">Register</a>
                <a href="#" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#subscribeModal1">Subscribe</a>
            </form>
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
                                <div class="card" id="card-subs">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Standard</h5>
                                        <p class="card-text">₱1,000/Month</p>
                                        <a class="btn btn-primary" href="/subscription/1_month">
                                            Get
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" id="card-subs">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Premium</h5>
                                        <p class="card-text">₱12,000/Year</p>
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
