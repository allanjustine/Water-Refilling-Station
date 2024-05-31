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
                <div class="card-header">
                    <h3 class="text-center">Customers Order</h3>
                </div>

                <div class="card-body">
                    @if(session('approve'))
                    <p class="text-center alert alert-success">{{ session('approve') }}</p>
                    @endif
                    @if ($orders->isEmpty())
                    <p class="text-center">No orders yet.</p>
                    @else
                    <table class="table order-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
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
                                <td>
                                    <b><p class="text-danger">{{ $order->user->name }}</p></b>
                                    <p><strong>{{ $order->user->address }}, {{ $order->user->municipality }}</strong></p>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="Product Image" class="product-image">
                                </td>
                                <td>Buy: x{{ $order->buy }}<br>Own: x{{ $order->own }}<br>Borrow: x{{ $order->borrow }}</td>
                                <td>{{ $order->status }}</td>

                                <form action="{{ route('verify', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <div class="mb-3">

                                            <label for="jug_status">Product Status</label>
                                            <select class="form-select verification-status" name="status">
                                                <option value="On Process" {{ $order->status === 'On Process' ? 'selected hidden' : '' }}>
                                                    On Process</option>
                                                <option value="For Delivery" {{ $order->status === 'For Delivery' ? 'selected hidden' : '' }}>
                                                    For Delivery</option>
                                                <option value="Delivered" {{ $order->status === 'Delivered' ? 'selected hidden' : '' }}>
                                                    Delivered</option>
                                                <option value="Paid" {{ $order->status === 'Paid' ? 'selected hidden' : '' }}>Paid
                                                </option>
                                            </select>
                                        </div>
                                    <td>
                                        <p>
                                            <input type="text" hidden name="payment_method" value="{{ $order->payment_method }}" id="">
                                            {{ $order->payment_method }}
                                        </p>
                                        <p class="{{ $order->payment_method == 'Cash on Delivery' ? 'd-none' : '' }}"><strong>Reference #: </strong><span class="text-muted"><i>{{ $order->payment_method == 'Gcash' ? $order->reference_number : '' }}</i></span></p>
                                    </td>
                                    <td><button class="btn btn-primary verify-btn" type="submit">Update</button>
                                        <br>
                                </form>

                                <form action="/return/jugs/{{ $order->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" hidden name="borrow" value="{{ $order->borrow }}">
                                    <button class="btn btn-info mt-1 text-white {{ $order->borrow <= 0 ? 'd-none' : '' }}" {{ $order->status != 'Paid' ? 'hidden' : '' }} type="submit">Returning of Jugs</button>
                                </form>
                                </td>
                                {{-- <td {{ $order->status == 'For Delivery' ? '' : 'hidden' }}>
                                @if (session('sms_sent'))
                                <p>SMS has been sent successfully!</p>
                                @else
                                <form action="{{ route('send-sms') }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Send SMS</button>
                                </form>
                                @endif
                                </td> --}}
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
