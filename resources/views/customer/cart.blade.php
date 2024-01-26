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
                    <div class="card-header"><h3>My Cart</h3>
                    </div>

                    <div class="card-body">

                        <!-- Display flash message -->
                        @if (session('order'))
                            <div class="alert alert-success">
                                {{ session('order') }}
                            </div>
                        @endif

                        <h2>Your Shopping Cart</h2>

                        @if (count($cartItems) > 0)
                            <ul>
                                @foreach ($cartItems as $cartItem)
                                    {{-- Skip the approved product from the display --}}
                                    @if (session('success') && $cartItem->product->id == session('approved_product_id'))
                                        @continue
                                    @endif

                                    <li class="mb-3">
                                        @if ($cartItem->product->image)
                                            <img src="{{ asset('storage/' . $cartItem->product->image) }}"
                                                alt="{{ $cartItem->product->name }}"
                                                style="max-width: 100px; max-height: 100px;">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                        Created by: {{ $cartItem->product->user->name }}
                                        <br>
                                        {{ $cartItem->product->name }} - Quantity: {{ $cartItem->quantity }} -
                                        ₱{{ $cartItem->quantity * $cartItem->product->price }}
                                        <a href="/customer/cart/{{ $cartItem->id }}/remove"
                                            class="btn btn-danger">Remove</a>
                                        <br><br>

                                        @if ($cartItem->product->user->type == 'Disabled')
                                            <span class="text-danger">Unable to place an order because the subscription of
                                                the product owner has expired or perhaps the owner's account is not
                                                approved.</span>
                                        @else
                                            <form action="/customer/buy" method="post" id="orderForm">
                                                @csrf
                                                <!-- Add hidden input fields to pass product_id and quantity -->
                                                <input type="hidden" name="product_id"
                                                    value="{{ $cartItem->product->id }}">
                                                <input type="hidden" name="order_quantity"
                                                    value="{{ $cartItem->quantity }}">
                                                <select name="payment_method" id="paymentMethod" class="form-select mb-3">
                                                    <option selected hidden>Select Payment Method</option>
                                                    <option disabled>Select Payment Method</option>
                                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                                    <option value="Gcash">Gcash</option>
                                                    <option value="Debit Card">Debit Card</option>
                                                </select>
                                                <div id="gcashFields" style="display: none">

                                                    <h5 class="text-center">Fill Up Gcash Information</h5>
                                                    <hr>
                                                    <div class="row mb-3">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="gcash_name">Gcash Account Name</label>
                                                                <input type="text" name="gcash_name"
                                                                    placeholder="Gcash Account Name" class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                        <div class="col-6">

                                                            <div class="form-group">
                                                                <label for="gcash_number">Gcash Account Number</label>
                                                                <input type="number" name="gcash_number"
                                                                    placeholder="Gcash Account Number" class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div id="debitCardFields" style="display: none">
                                                    <h5 class="text-center">Fill Up Debit Card Information</h5>
                                                    <hr>
                                                    <div class="row mb-3">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="deb_name">Debit Account Name</label>
                                                                <input type="text" name="deb_name"
                                                                    placeholder="Debit Account Name" class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                        <div class="col-6">

                                                            <div class="form-group">
                                                                <label for="deb_number">Debit Account Number</label>
                                                                <input type="number" name="deb_number"
                                                                    placeholder="Debit Account Number" class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success">Order Water Now</button>
                                            </form>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                            @if ($latestOrderAttributes && $latestOrderAttributes['status'] === 'completed')
                                <form action="/customer/acknowledge-water/{{ $latestOrderAttributes['id'] }}"
                                    method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Acknowledge Water</button>
                                </form>
                            @endif
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('paymentMethod').addEventListener('change', function() {
            var gcashFields = document.getElementById('gcashFields');
            var debitCardFields = document.getElementById('debitCardFields');
            var submitOrderButton = document.getElementById('submitOrder');

            gcashFields.style.display = 'none';
            debitCardFields.style.display = 'none';

            if (this.value === 'Gcash' || this.value === 'Debit Card') {
                gcashFields.style.display = this.value === 'Gcash' ? 'block' : 'none';
                debitCardFields.style.display = this.value === 'Debit Card' ? 'block' : 'none';
                submitOrderButton.innerHTML = 'Fill Up Form Before Ordering';
                submitOrderButton.onclick = function() {
                    alert('Fill up the form before ordering.');
                };
            } else {
                submitOrderButton.innerHTML = 'Order Water Now';
                submitOrderButton.onclick = function() {
                    document.getElementById('orderForm').submit();
                };
            }
        });
    </script>
@endsection
