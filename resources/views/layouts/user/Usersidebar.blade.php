<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add styling for the sidebar */
        .sidebar {
            width: 200px;
            height: 100%;
            position: fixed;
            top: 0;
            /* Adjusted to 0 */
            left: 0;
            background-color: #333;
            padding-top: 20px;
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
            color: white;
            /* Change the color on hover as needed */
        }

        /* Adjust the main content area to accommodate the sidebar */
        .main-content {
            margin-left: 200px;
            /* Adjusted to match sidebar width */
            padding-left: 20px;
            /* Added padding to create space between sidebar and content */
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
            <li><a class="bn3637 bn38" href="{{ route('customer.home') }}">Dashboard</a></li>
            <li><a class="bn3637 bn38" href="{{ url('customer/cart') }}">My
                    Cart({{ auth()->user()->carts()->count() }})</a></li>
            <li><a class="bn3637 bn38" href="{{ url('customer/my-orders') }}">My
                    Orders({{ auth()->user()->orders()->count() }})</a></li>
            <li><a class="bn3637 bn38" href="{{ url('customer/product') }}">Products</a></li>

            <li>
                <a class="bn3637 bn38" href="/chatify/1">
                    <i class="fas fa-check-circle"></i> Chat({{ \App\Models\ChMessage::where('to_id', auth()->user()->id)->where('seen', 0)->count() }})
                </a>
            </li>
            <!-- Add more sidebar links as needed -->
        </ul>
    </div>

</body>

</html>
