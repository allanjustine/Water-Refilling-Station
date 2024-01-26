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
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                        <p>No orders pending approval.</p>
                    @else
                        <table class="table order-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>User</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Payment Method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    @if($order->product && $order->product->user_id == auth()->user()->id)
                                        <tr>
                                            <td>{{ $order->id }}</td>
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
                                                    x{{ $order->order_quantity }} <br> ₱{{ $order->order_quantity * $order->product->price }}
                                                @endif
                                            </td>
                                            <td class="text-danger">{{ $order->status }}</td>
                                            <td>{{ $order->payment_method }}</td>

                                            <td>
                                                <!-- Add the form to update order status -->
                                                <form action="{{ route('approveOrder', ['orderId' => $order->id]) }}" method="post">
                                                    @csrf
                                                    @method('patch')

                                                        <!-- Add a link to the order status page -->
                                                        <button type="submit" class="btn btn-primary" {{ $order->product->product_quantity == 0 ? 'disabled' : '' }}>Approved</button>
                                                    </td>
                                                </form>
                                            </td>

                                        </tr>
                                    @endif
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
