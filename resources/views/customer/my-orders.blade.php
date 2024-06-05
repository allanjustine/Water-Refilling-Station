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
                            <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}" style="max-width: 100px; max-height: 100px;">
                            @else
                            <p>No image available</p>
                            @endif
                            Created by: {{ $order->product->user->name }}
                            <br>
                            {{ $order->product->name }} - Quantity: x{{ $order->order_quantity }} - Own: x{{ $order->own }} -
                            ₱{{ number_format(($order->order_quantity + $order->own) * $order->product->price + ($order->product->extra * $order->buy), 2) }}

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

                            <a href="{{ url('/customer/purchase-confirmation', $order->id) }}" class="btn btn-secondary">View</a>
                            @if($order->status == 'Paid' && !$order->user->hasRatedOrder($order->id))
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#submitRating{{ $order->id }}">Submit Rating</a>
                            @else

                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#viewRating{{ $order->id }}">View Rating</a>

                            @endif

                        </li>
                        <hr>
                        <div class="modal fade" id="submitRating{{ $order->id }}" tabindex="-1" aria-labelledby="submitRatingLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="/submit-rating/{{ $order->id }}" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="submitRatingLabel">Submit Rating</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <input type="text" hidden value="{{ $order->id }}" name="order_id">
                                            <input type="text" hidden value="{{ $order->product->id }}" name="product_id">
                                            <input type="text" hidden value="{{ auth()->user()->id }}" name="user_id">

                                            <label for="user_rate">How many stars you can rate this product?</label>
                                            <div class="d-flex justify-content-center">
                                                <select name="user_rate" id="" class="form-select">
                                                    <option value="" selected hidden>How many stars you can rate this product?</option>
                                                    <option disabled>How many stars you can rate this product?</option>
                                                    <option value="1">&starf;</option>
                                                    <option value="2">&starf;&starf;</option>
                                                    <option value="3">&starf;&starf;&starf;</option>
                                                    <option value="4">&starf;&starf;&starf;&starf;</option>
                                                    <option value="5">&starf;&starf;&starf;&starf;&starf;</option>
                                                </select>
                                                @error('user_rate')
                                                <h6 class="text-center text-danger">*Please select rating first</h6>
                                                @enderror
                                            </div>
                                            <hr>
                                            <div class="mt-3">
                                                <label for="user_rate">Leave a feedback about our product.</label>
                                                <textarea name="feedback" id="" cols="30" rows="5" class="form-control" placeholder="Your feedback (Optional)"></textarea>
                                                @error('feedback')
                                                <h6 class="text-center text-danger">*Please select rating first</h6>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit Rating</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                        <div class="modal fade" id="viewRating{{ $order->id }}" tabindex="-1" aria-labelledby="viewRatingLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewRatingLabel">Viewing Your Ratings for <strong>{{ $order->product->name }}</strong></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            @foreach ($order->ratings->where('user_id', auth()->user()->id) as $rating)

                                            <h3>You Rated: {{ $rating->user_rate }} <span class="text-warning">&starf;</span></h3>
                                            <h4>
                                                <p>Your feedback: {{ $rating->feedback }}</p>
                                            </h4>
                                            @endforeach

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                            </div>
                        </div>

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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
