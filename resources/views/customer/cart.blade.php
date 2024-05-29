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

                    <h3 class="text-center">Your Shopping Cart</h3>
                </div>

                <div class="card-body">

                    <!-- Display flash message -->
                    @if (session('order'))
                    <div class="alert alert-success">
                        {{ session('order') }}
                    </div>
                    @endif


                    @if (count($cartItems) > 0)
                    <ul>
                        @foreach ($cartItems as $cartItem)
                        {{-- Skip the approved product from the display --}}
                        @if (session('success') && $cartItem->product->id == session('approved_product_id'))
                        @continue
                        @endif

                        <li class="mb-3">
                            @if ($cartItem->product->image)
                            <img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" style="max-width: 100px; max-height: 100px;">
                            @else
                            <p>No image available</p>
                            @endif
                            Created by: {{ $cartItem->product->user->name }}
                            <br>
                            {{ $cartItem->product->name }} - Quantity: {{ $cartItem->quantity }} - Own: {{ $cartItem->own }} -
                            ₱{{ number_format(($cartItem->quantity + $cartItem->own) * $cartItem->product->price, 2) }}
                            <a href="/customer/cart/{{ $cartItem->id }}/remove" class="btn btn-danger">Remove</a>
                            <br><br>


                            @if ($cartItem->product->user->type == 'Disabled')
                            <span class="text-danger">Unable to place an order because the subscription of
                                the product owner has expired or perhaps the owner's account is not
                                approved.</span>
                            @else
                            <form action="/customer/buy" method="post" id="orderForm">
                                @csrf
                                <!-- Add hidden input fields to pass product_id and quantity -->
                                <input type="hidden" name="product_id" value="{{ $cartItem->product->id }}">
                                <input type="hidden" name="order_quantity" value="{{ $cartItem->quantity }}">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-2">
                                            <label for="borrow">Borrowed Jugs</label>
                                            <input type="number" readonly class="form-control" name="borrow" value="{{ $cartItem->borrow }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-2">
                                            <label for="own">Owned Jugs</label>
                                            <input type="number" readonly class="form-control" name="own" value="{{ $cartItem->own }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-2">
                                            <label for="buy">Bought Jugs</label>
                                            <input type="number" readonly class="form-control" name="buy" value="{{ $cartItem->buy }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="payment_method">Select Payment Method</label>
                                    {{-- <select name="payment_method" id="paymentMethod" class="form-select mb-3">
                                        <option selected hidden value="">Select Payment Method</option>
                                        <option disabled>Select Payment Method</option>
                                        <option value="Cash on Delivery">Cash on Delivery</option>
                                        <option value="Gcash">Gcash</option>
                                    </select> --}}
                                    <div class="form-group">
                                        <input type="radio" name="payment_method" value="Cash on Delivery">
                                        <label for="cod"><strong>Cash on Delivery</strong></label>
                                        |
                                        <input type="radio" id="gcash" name="payment_method" value="Gcash">
                                        <label for="gcash"><strong>Gcash</strong></label>
                                    </div>
                                    @error('payment_method')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group reference-number" style="display: none;">

                                    <h5 class="text-center">Our Gcash Information</h5>
                                    <hr>
                                    <p class="text-center text-info">Please select one gcash account. <br><span class="text-danger"><strong>Take note:</strong></span> Payment method using Gcash needs a reference number. <br>If the reference number is wrong or invalid we will automatically cancel your order.</p>
                                    <div class="row mb-3">
                                        @foreach ($cartItem->product->user->gcashDetails as $gcash)
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="gcash_name">Gcash Account Name</label>
                                                <input type="text" name="gcash_name" value="{{ $gcash->account_name }}" readonly placeholder="Gcash Account Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group">
                                                <label for="gcash_number">Gcash Account Number</label>
                                                <input type="number" name="gcash_number" value="{{ $gcash->account_number }}" readonly placeholder="Gcash Account Number" class="form-control">
                                            </div>
                                        </div>

                                        @endforeach
                                        <div class="col-12 mt-2">
                                            <label for="reference_number"><strong>Enter Your Reference Number</strong></label>
                                            <input type="text" id="reference_number" placeholder="Enter Your Reference Number" name="reference_number" class="form-control">
                                            @error('reference_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
                    <form action="/customer/acknowledge-water/{{ $latestOrderAttributes['id'] }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-info">Acknowledge Water</button>
                    </form>
                    @endif
                    @else
                    <p class="text-center">Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        const referenceNumberInput = document.querySelector('.reference-number');

        paymentMethods.forEach(paymentMethod => {
            paymentMethod.addEventListener('change', function() {
                if (this.value === 'Gcash') {
                    referenceNumberInput.style.display = 'block';
                } else {
                    referenceNumberInput.style.display = 'none';
                }
            });
        });
    });

</script>
@endsection
