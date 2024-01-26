@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')

@section('content')

<style>
    .user-name {
        color: #ff0000; /* Set your desired text color */
        font-weight: bold; /* Set other styles as needed */
    }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">

                <form action="/subscribers/products/{{ $product->id }}/update" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">Name:</label>
                    <input class="form-control mb-3" type="text" name="name" value="{{ $product->name }}" required>

                    <label for="price">Price:</label>
                    <input class="form-control mb-3" type="number" name="price" step="0.01" value="{{ $product->price }}" required>

                    <label for="product_quantity">Quantity:</label>
                    <input class="form-control mb-3" type="number" name="product_quantity" step="0.01" value="{{ $product->product_quantity }}" required>


                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <a href="{{ url('/subscribers/products') }}" class="btn btn-secondary">Cancel</a>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
