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
                            <a href="#" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $order->id }}">Cancel</a>
                        @elseif ($order->status === 'Paid')
                        @else
                            <h5 class="text-danger">Sorry your order is {{ $order->status }}. You can't cancel it anymore
                            </h5>
                        @endif
                        <!-- Display other order details as needed -->
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Order ID: {{ $order->id }}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this order?
                                    </div>
                                    <form action="{{ route('purchase.delete', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
@endsection
