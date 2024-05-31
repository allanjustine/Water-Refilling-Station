@extends('layouts.user.app')

@include('layouts.user.Usersidebar')
@section('content')

    <style>
        .user-name {
            color: #3366cc;
            /* Set your desired text color */
            font-weight: bold;
            /* Set other styles as needed */
        }

        .cart-link {
            text-decoration: none;
            color: #000;
            /* Adjust the color for the link text */
        }

        .cart-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            margin-right: 5px;
            /* Adjust the margin as needed */
            fill: none;
            /* Color for the icon */
            stroke: #000;
            /* Color for the icon */
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">My Orders</h3>


                    </div>

                    <div class="card-body">

                        <!-- Display flash message -->
                        @if (session('order'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('order') }}
                            </div>
                        @endif
                        @if (session('orderError'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('orderError') }}
                            </div>
                        @endif

                        @if (count($orders) > 0)
                            <ul>
                                @foreach ($orders as $order)
                                    {{-- Skip the approved product from the display --}}
                                    @if (session('success') && $order->product->id == session('approved_product_id'))
                                        @continue
                                    @endif

                                    <li>
                                        @if ($order->product->image)
                                            <img src="{{ asset('storage/' . $order->product->image) }}"
                                                alt="{{ $order->product->name }}"
                                                style="max-width: 100px; max-height: 100px;">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                        Created by: {{ $order->product->user->name }}
                                        <br>
                                        {{ $order->product->name }} - Quantity: x{{ $order->order_quantity }} - Own: x{{ $order->own }} -
                                        ₱{{ number_format(($order->order_quantity + $order->own) * $order->product->price, 2) }}

                                        <br><br>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-2">
                                                    <label for="borrow">Borrowed Jugs</label>
                                                    <input type="number" readonly class="form-control" name="borrow" value="{{ $order->borrow }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-2">
                                                    <label for="own">Owned Jugs</label>
                                                    <input type="number" readonly class="form-control" name="own" value="{{ $order->own }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-2">
                                                    <label for="buy">Bought Jugs</label>
                                                    <input type="number" readonly class="form-control" name="buy" value="{{ $order->buy }}">
                                                </div>
                                            </div>
                                        </div>

                                        @if ($order->status === 'For Delivery')
                                            <p class="text-info"><strong>Order is for delivery</strong></p>
                                        @elseif($order->status === 'Delivered')
                                            <p class="text-success"><strong>Order has been delivered</strong></p>
                                        @elseif($order->status === 'Pending')
                                            <p class="text-danger"><strong>Pending</strong></p>
                                        @elseif($order->status === 'On Process')
                                            <p class="text-success"><strong>Processing order...</strong></p>
                                        @elseif($order->status === 'Cancelled')
                                        <p class="text-danger"><strong>Your order was cancelled...</strong></p>
                                        <p class="text-danger"><strong>Reason of cancellation:</strong> {{ $order->reason }}</p>
                                        @else
                                            <p class="text-success"><strong>Paid</strong></p>
                                        @endif

                                        @if ($order->jug_status === 'Sold')
                                            <p>Jugs Status: <span class="text-primary"><strong>You bought
                                                        <strong>x{{ $order->order_quantity }}</strong> jug(s) in this
                                                        order</strong></span></p>
                                        @elseif($order->jug_status === 'Borrow')
                                            <p>Jugs Status: <span class="text-warning"><strong>You borrowed
                                                        <strong>x{{ $order->order_quantity }}</strong> jug(s) in this
                                                        order</strong></span></p>
                                        @elseif($order->jug_status === 'Return')
                                            <p>Jugs Status: <span class="text-primary"><strong>You already returned the
                                                        <strong>x{{ $order->order_quantity }}</strong> jug(s) in this
                                                        order</strong></span></p>
                                        @endif

                                        <a href="{{ url('/customer/purchase-confirmation', $order->id) }}"
                                            class="btn btn-secondary">View</a>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center">Your cart is empty.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
