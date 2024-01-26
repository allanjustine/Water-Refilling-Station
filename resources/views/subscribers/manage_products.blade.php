@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')


@section('content')

<style>
    .user-name {
        color: #3366cc; /* Set your desired text color */
        font-weight: bold; /* Set other styles as needed */
    }

    body {
        background-image: url('{{ asset("../images/3.jpg") }}');
        background-size: cover; /* Adjust as needed */
        background-repeat: no-repeat;
        background-attachment: fixed; /* Ensures the background stays fixed while scrolling */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Products') }}</div>

                <div class="card-body">

                    @if(count($products) > 0)
                        <ul style="list-style: none; padding: 0;">
                            @foreach($products as $product)
                                @if($product->user_id == auth()->user()->id)
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
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <p>No products available.</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
