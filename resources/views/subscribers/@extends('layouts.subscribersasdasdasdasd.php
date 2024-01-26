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
                    <div class="card-header">{{ __('Orders for Approval') }}</div>

                    <div class="card-body">
                        <h3>Order List</h3>

                        @foreach ($orders as $order)
                            <div class="order-item">
                                <p>Order ID: {{ $order->id }}</p>
                                <p>Product: {{ $order->product->name }}</p>
                                <p>Quantity: {{ $order->order_quantity }}</p>
                                <p>Status: {{ $order->status }}</p>

                                <!-- Add the form to update order status -->
                                <form action="{{ route('approveOrder', ['orderId' => $order->id]) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <label for="status">Change Status:</label>
                                    <select name="status" id="status">
                                        <option value="On Process">On Process</option>
                                        <option value="For Delivery">For Delivery</option>
                                        <option value="Delivered">Delivered</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
