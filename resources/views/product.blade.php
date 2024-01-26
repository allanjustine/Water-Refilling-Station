@extends('layouts.app')

@section('content')
    <style>
        .user-name {
            color: #3366cc;
            /* Set your desired text color */
            font-weight: bold;
            /* Set other styles as needed */
        }

        body {
            background-image: url('{{ asset('../images/3.jpg') }}');
            background-size: cover;
            /* Adjust as needed */
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Ensures the background stays fixed while scrolling */
        }
    </style>

    {{-- <div class="container d-flex justify-content-center">
        <form class="form-inline mb-3 col-6" action="{{ route('search') }}" method="GET">
            @csrf
            <div class="input-group">

                <input type="search" class="form-control" placeholder="Search location" aria-label="Search"
                    aria-describedby="button-addon2" name="search" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-dark" type="submit" id="button-addon2"><i class="far fa-magnifying-glass"></i>
                        Search</button>
                </div>
            </div>
        </form>
    </div> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center" style="text-transform: uppercase;">{{ $user->municipality }}, WATER STATION
                        </h1>
                    </div>

                    <table class="styled-table table table-striped">
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <form action="/customer/cart/{{ $product->id }}/add" method="post">
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;">
                                            @else
                                                <p>No image available</p>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $product->name }} - ₱{{ $product->price }}
                                            <!-- Display other product details as needed -->
                                            @auth
                                                <p><a href="/chatify/{{ $product->user->id }}">Contact Now</a></p>
                                            @endauth
                                        </td>
                                        <td>Address: {{ $product->user->municipality }}, {{ $product->user->station }}</td>

                                        <td>
                                            <label for="quantity">Quantity:</label>
                                            <input type="number" name="quantity" value="1" min="1"
                                                max="50">
                                        </td>

                                        <td>
                                            @csrf
                                            <button type="submit" class="btn btn-primary" {{ $product->product_quantity == 0 ? 'disabled' : '' }}>Add to Cart</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
