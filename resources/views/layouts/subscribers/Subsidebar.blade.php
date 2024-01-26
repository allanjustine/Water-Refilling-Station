<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-AFNCoV3Z9cuHyJzzjwPHkjXy0ZNvD60bo+UvL+z3th7ciXznUySYpX3SjjFjvX6F3iJl/+8D2RvhTegw42IQpg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Add styling for the sidebar */
        .sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0; /* Adjusted to 0 */
            left: 0;
            background-color: #333;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
        }

        .sidebar a:hover {
            color: white; /* Change the color on hover as needed */
        }

        /* Adjust the main content area to accommodate the sidebar */
        .main-content {
            margin-left: 200px; /* Adjusted to match sidebar width */
            padding-left: 20px; /* Added padding to create space between sidebar and content */
        }


        .bn3637 {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.7rem 2rem;
            font-weight: 700;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            backface-visibility: hidden;
            border: 0.3rem solid transparent;
            border-radius: 3rem;
        }

        .bn38 {
            border-color: transparent;
            transition: background-color 0.3s ease-in-out;
        }

        .bn38:hover {
            background-color: #60605e;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <br><br>
    <ul>
    <li>
        <a class="bn3637 bn38" href="{{ route('subscribers.home') }}">
            <i class="fas fa-home"></i> Dashboard
        </a>
    </li>
    {{-- <li>
        <a class="bn3637 bn38" href="{{ url('/product/{id}') }}">
            <i class="fas fa-shopping-cart"></i> ALL SHOP
        </a>
    </li> --}}
    <li>
        <a class="bn3637 bn38" href="{{ url('subscribers/products') }}">
            <i class="fas fa-cube"></i> Products
        </a>
    </li>
    <li>
        <a class="bn3637 bn38" href="{{ url('subscribers/products/create') }}">
            <i class="fas fa-plus-circle"></i> Create Products
        </a>
    </li>
    <li>
        <a class="bn3637 bn38" href="{{ url('subscribers/orders') }}">
            <i class="fas fa-check-circle"></i> Approval
        </a>
    </li>

    <li>
        <a class="bn3637 bn38" href="{{ url('subscribers/orders/status/On Process') }}">
            <i class="fas fa-check-circle"></i> On Process
        </a>
    </li>
    <li>
        <a class="bn3637 bn38" href="{{ url('subscribers/orders/status/For Delivery') }}">
            <i class="fas fa-check-circle"></i> For Delivery
        </a>
    </li>
    <li>
        <a class="bn3637 bn38" href="{{ url('subscribers/orders/status/Delivered') }}">
            <i class="fas fa-check-circle"></i> Delivered
        </a>
    </li>
    <li>
        <a class="bn3637 bn38" href="{{ url('subscribers/orders/status/Paid') }}">
            <i class="fas fa-check-circle"></i> Paid
        </a>
    </li>
    <li>
        <a class="bn3637 bn38" href="/chatify/1">
            <i class="fas fa-check-circle"></i> Chat({{ \App\Models\ChMessage::where('to_id', auth()->user()->id)->where('seen', 0)->count() }})
        </a>
    </li>







    <!-- Add more sidebar links as needed -->
</ul>s


</div>

</body>
</html>
