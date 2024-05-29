@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')

@section('content')
<style>
    .user-name {
        color: #ff0000;
        font-weight: bold;
    }

    .product-image {
        max-width: 100px;
        max-height: 100px;
    }

    .order-table {
        width: 100%;
        margin-top: 20px;
    }

    .approve-btn {
        margin-top: 10px;
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">{{ __('Pending Order') }}</h3>
                </div>

                <div class="card-body">
                    @if(session('approve'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('approve') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if($orders->isEmpty())
                    <p class="text-center">No Pending orders.</p>
                    @else
                    <table class="table order-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Jugs Status</th>
                                <th>Reason</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            @if($order->product && $order->product->user_id == auth()->user()->id)
                            <tr>
                                <td><span class="user-name">{{ $order->user->name }}</span></td>
                                <td>
                                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="Product Image" class="product-image">
                                </td>

                                <td>
                                    @if(session('approved_product_id') == $order->product->id)
                                    {{ $order->product->name }} - Quantity: {{ session('approved_product_quantity') }} - ₱{{ session('approved_product_quantity') * $order->product->price }}
                                    @php
                                    session()->forget(['approved_product_id', 'approved_product_quantity']);
                                    @endphp
                                    @else
                                    x{{ $order->order_quantity }}
                                    <br>Own: x{{ $order->own }} <br> ₱{{ number_format(($order->order_quantity + $order->own) * $order->product->price, 2) }}
                                    @endif
                                </td>
                                <td>
                                    <p><strong>Borrow:</strong> {{ $order->borrow }} jug(s)</p>
                                    <p><strong>Buy:</strong> {{ $order->buy }} jug(s)</p>
                                    <p><strong>Own:</strong> {{ $order->own }} jug(s)</p>
                                </td>
                                <td class="text-danger">{{ $order->reason ?? $order->status }}</td>
                                <td>
                                    <p>{{ $order->payment_method }}</p>
                                    <p class="{{ $order->payment_method == 'Cash on Delivery' ? 'd-none' : '' }}"><strong>Reference #: </strong><span class="text-muted"><i>{{ $order->payment_method == 'Gcash' ? $order->reference_number : '' }}</i></span></p>
                                </td>

                                <td>
                                    <!-- Add the form to update order status -->
                                    <form action="{{ route('approveOrder', ['orderId' => $order->id]) }}" method="POST">
                                        @csrf

                                        <!-- Add a link to the order status page -->
                                        <button type="submit" class="btn btn-primary" {{ $order->product->product_quantity == 0 ? 'disabled' : '' }}>Approved</button>
                                        <a href="#" class="btn btn-danger mt-2" data-toggle="modal" data-target="#orderModal{{ $order->id }}">Cancel</a>
                                        <br>
                                        @error('reason')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </td>
                                </form>
                                </td>

                            </tr>
                            @endif
                            <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="/cancel/order/{{ $order->id }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="orderModalLabel">Reason for cancelling this order <strong>{{ $order->product->name }}</strong> from <strong>{{ $order->user->name }}</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="reason"><strong>Reason for cancelling the order:</strong></label>
                                                    <input type="text" class="form-control" name="reason" placeholder="Reason for cancelling the order.">
                                                    @error('reason')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
