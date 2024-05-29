@extends('layouts.user.app')

@include('layouts.user.Usersidebar')
@section('content')
<style>
    .user-name {
        color: #3366cc;
        font-weight: bold;
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $order->product->name }}&apos;s info.</h3>
                </div>

                <div class="card-body">
                    <h2>Purchase Confirmation</h2>
                    <p>Thank you for your purchase!</p>
                    <p>Order ID: {{ $order->id }}</p>

                    @if ($order->status === 'For Delivery')
                    <p>Status: <span class="text-info"><strong>Order is for delivery</strong></span></p>
                    @elseif($order->status === 'Delivered')
                    <p>Status: <span class="text-success"><strong>Order has been delivered</strong></span></p>
                    @elseif ($order->status === 'Pending')
                    <p>Status: <span class="text-danger"><strong>Pending</strong></span></p>
                    @elseif($order->status === 'On Process')
                    <p>Status: <span class="text-success"><strong>Processing order...</strong></span></p>
                    @elseif($order->status === 'Cancelled')
                    <p class="text-danger"><strong>Your order was cancelled...</strong></p>
                    <p class="text-danger"><strong>Reason of cancellation:</strong> {{ $order->reason }}</p>
                    @else
                    <p>Status: <span class="text-success"><strong>PAID</strong></span></p>
                    @endif

                    @if ($order->jug_status === 'Sold')
                    <p>Jugs Status: <span class="text-primary"><strong>You bought
                                <strong>x{{ $order->order_quantity }}</strong> jug(s) in this order</strong></span>
                    </p>
                    @elseif($order->jug_status === 'Borrow')
                    <p>Jugs Status: <span class="text-warning"><strong>You borrowed
                                <strong>x{{ $order->order_quantity }}</strong> jug(s) in this order</strong></span>
                    </p>
                    @elseif ($order->jug_status === 'Return')
                    <p>Jugs Status: <span class="text-primary"><strong>You already returned the
                                <strong>x{{ $order->order_quantity }}</strong> jug(s) in this order</strong></span>
                    </p>
                    @else
                    @endif

                    @if ($order->status === 'Pending')
                    <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $order->id }}">Cancel</a>
                    @elseif ($order->status === 'Paid' || $order->status === 'On Process' || $order->status === 'For Delivery' || $order->status === 'Delivered')
                    <h5 class="text-danger">Sorry your order is {{ $order->status }}. You can't cancel it anymore
                    </h5>
                    @elseif($order->status === 'Cancelled')
                    <form action="/repurchase/{{ $order->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-dark text-white"><strong>Repurchase</strong></button>
                    </form>
                    @endif
                    <!-- Display other order details as needed -->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Order ID: {{ $order->id }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this order?
                                </div>
                                <form action="{{ route('purchase.delete', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-left: 15%">
    <div class="mt-5">
        <h3 class="text-center">SIMILAR PRODUCTS</h3>
        <hr>
        <div class="card-body">
            @error('quantity')
            <span class="text-danger">Make sure add quantity either (Borrow, Buy or Having own jugs)</span>
            @enderror
            <div class="row">
                @forelse ($similars as $product)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ Storage::url($product->image) }}" style="height: 250px;">
                        <div class="card-body">
                            <p><strong>
                                    <h3>{{ $product->name }}</h3>
                                </strong></p>
                            <p><strong>₱{{ $product->price }}</strong></p>
                            <form action="/customer/cart/{{ $product->id }}/add" method="post">
                                <hr>
                                <p class="text-danger"><strong>Warning:</strong>Select only the best quantity of the gallons specially to Borrow gallons</p>
                                <hr>
                                <p>Borrow jugs</p>
                                <input class="form-control" value="0" name="borrow" type="number" min="0">
                                <p>Buy jugs</p>
                                <input class="form-control" value="0" name="buy" type="number" min="0">
                                <p>Own jugs</p>
                                <input class="form-control" value="0" name="own" type="number" min="0">
                                <p>
                                    <input type="number" name="quantity" value="1" hidden>
                                    @error('quantity')
                                    <span class="text-danger">Make sure add quantity either (Borrow, Buy or Having own jugs)</span>
                                    @enderror
                                </p>
                        </div>
                        <div class="card-footer">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100" {{ $product->product_quantity == 0 ? 'disabled' : '' }}>Add to Cart</button>
                        </div>
                    </div>
                    </form>
                </div>
                @empty
                <h5 class="text-center">No similar products</h5>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
