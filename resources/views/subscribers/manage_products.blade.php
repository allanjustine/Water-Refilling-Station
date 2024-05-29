@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')


@section('content')

<style>
    .user-name {
        color: #3366cc;
        /* Set your desired text color */
        font-weight: bold;
        /* Set other styles as needed */
    }

    body {
        background-image: url('{{ asset("../images/3.jpg") }}');
        background-size: cover;
        /* Adjust as needed */
        background-repeat: no-repeat;
        background-attachment: fixed;
        /* Ensures the background stays fixed while scrolling */
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">{{ __('Manage Products') }}</h3>
                </div>

                <div class="card-body">
                    <a href="/subscribers/products/create" class="btn btn-primary float-end">Add new product</a>
                    <ul style="list-style: none; padding: 0; margin-top: 50px;">
                        <hr>
                        @forelse($products as $product)
                        <li style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
                            <div style="display: flex; align-items: center;">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                                <span>
                                    {{ $product->name }} - ₱{{ $product->price }}
                                </span>
                            </div>
                            <p>Quantity: x{{ $product->product_quantity }}</p>
                            <div>
                                <a href="/subscribers/products/{{ $product->id }}/edit" class="btn btn-warning">Edit</a>
                                <a href="/subscribers/products/{{ $product->id }}/delete" class="btn btn-danger">Delete</a>
                            </div>
                        </li>
                        @empty
                        <p class="text-center mt-5">No products available.</p>
                        @endforelse
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
