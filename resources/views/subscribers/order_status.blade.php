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

        .verify-btn {
            margin-top: 10px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if ($orders->isEmpty())
                            <p>No orders with the selected status.</p>
                        @else
                            <table class="table order-table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Select</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td class="text-danger"><b>{{ $order->user->name }}</b></td>
                                            <td>
                                                <img src="{{ asset('storage/' . $order->product->image) }}"
                                                    alt="Product Image" class="product-image">
                                            </td>
                                            <td>{{ $order->order_quantity }}</td>
                                            <td>{{ $order->status }}</td>

                                            <form action="{{ route('verify', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <td>
                                                    <div class="mb-3"
                                                        {{ $order->status == 'For Delivery' ? '' : 'hidden' }}>
                                                        <label for="jug_status">Jug Status</label>
                                                        <select class="form-select verification-status" name="jug_status">
                                                            <option value="Sold"
                                                                {{ $order->status === 'Sold' ? 'selected' : '' }}>Sold
                                                            </option>
                                                            <option value="Borrow"
                                                                {{ $order->status === 'Borrow' ? 'selected' : '' }}>Borrow
                                                            </option>
                                                        </select>

                                                    </div>
                                                    @if ($order->jug_status == 'Borrow')
                                                    <input type="number" hidden name='order_quantity' value="{{ $order->order_quantity }}">
                                                    <div class="mb-3" {{ $order->status == 'Delivered' ? '' : 'hidden' }}>
                                                        <label for="jug_status">Jug Status</label>
                                                        <select class="form-select verification-status" name="jug_status">
                                                            <option value="Return"
                                                                {{ $order->status === 'Return' ? 'selected' : '' }}>Return
                                                            </option>
                                                        </select>

                                                    </div>
                                                    @endif
                                                    <div class="mb-3">

                                                        <label for="jug_status">Product Status</label>
                                                        <select class="form-select verification-status" name="status">
                                                            <option value="On Process"
                                                                {{ $order->status === 'On Process' ? 'selected' : '' }}>
                                                                Verify On Process</option>
                                                            <option value="For Delivery"
                                                                {{ $order->status === 'For Delivery' ? 'selected' : '' }}>
                                                                Verify For Delivery</option>
                                                            <option value="Delivered"
                                                                {{ $order->status === 'Delivered' ? 'selected' : '' }}>
                                                                Verify Delivered</option>
                                                            <option value="Paid"
                                                                {{ $order->status === 'Paid' ? 'selected' : '' }}>Paid
                                                            </option>
                                                        </select>

                    <td>{{ $order->payment_method }}</td>
                                                <td><button class="btn btn-primary verify-btn"
                                                        type="submit">Verify</button></td>

                    </div>
                    </td>

                    </form>
                    <td {{ $order->status == 'For Delivery' ? '' : 'hidden' }}>
                        @if (session('sms_sent'))
                            <p>SMS has been sent successfully!</p>
                        @else
                            <form action="{{ route('send-sms') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-warning">Send SMS</button>
                            </form>
                        @endif
                    </td>
                    <!-- Add more cells based on your order information -->
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{ $orders->links('pagination::bootstrap-5') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
