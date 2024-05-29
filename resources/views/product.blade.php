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
        background-image: url('{{ asset('../images/bg.jpg') }}');
        background-size: cover;
        /* Adjust as needed */
        background-repeat: no-repeat;
        background-attachment: fixed;
        /* Ensures the background stays fixed while scrolling */
    }

    .card {
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
    }

</style>

{{-- <div class="container d-flex justify-content-center">
        <form class="form-inline mb-3 col-6" action="{{ route('search') }}" method="GET">
@csrf
<div class="input-group">

    <input type="search" class="form-control" placeholder="Search location" aria-label="Search" aria-describedby="button-addon2" name="search" value="{{ $search }}">
    <div class="input-group-append">
        <button class="btn btn-dark" type="submit" id="button-addon2"><i class="far fa-magnifying-glass"></i>
            Search</button>
    </div>
</div>
</form>
</div> --}}

<div class="">
    <div class="justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center" style="text-transform: uppercase;">{{ $user->municipality }}, WATER REFILLING STATION
                    </h2>
                </div>

                <div class="card-body p-3">

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="row">
                        @forelse ($groupedProducts as $station => $products)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card">
                                <img @if($products[0]->user->avatar == null)
                                src="/images/Zaza.jpg"
                                @else
                                src="{{ Storage::url($products[0]->user->avatar) }}"
                                @endif
                                class="card-img-top img-fluid" style="height: 200px;" alt="User Avatar">
                                <div class="card-body">
                                    <h3 title="{{ $products[0]->user->station }}"><strong>{{ str()->limit($products[0]->user->station, 45) }}</strong></h3>
                                    <h3 class="card-title">Address: {{ $products[0]->user->address }}, {{ $products[0]->user->municipality }}</h3>
                                    <p class="card-text">Total products: {{ $products->count() }}</p>
                                    <a href="#" class="btn btn-primary w-100" data-toggle="modal" data-target="#viewProduct{{ $products[0]->user->id  }}">View products</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="viewProduct{{ $products[0]->user->id  }}" data-keyboard="false" tabindex="-1" aria-labelledby="viewProductLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewProductLabel">{{ $products[0]->user->address }}, {{ $products[0]->user->municipality }} - {{ $products[0]->user->station }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            @forelse($products as $product)
                                            <div class="col-md-4 mb-4">
                                                <form action="/customer/cart/{{ $product->id }}/add" method="post">
                                                    <div class="card border">
                                                        @if ($product->image)
                                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="height: 200px;">
                                                        @else
                                                        <img src="/images/1702993470.png" alt="{{ $product->name }}" style="height: 250px;">
                                                        @endif
                                                        <div class="card-body">
                                                            <p>
                                                                <h3>{{ $product->name }}</h3>
                                                            </p>
                                                            <p>
                                                                <h5>₱{{ $product->price }}</h5>
                                                            </p>
                                                            <hr>
                                                            <p class="text-danger"><strong>Warning:</strong>Select only the best quantity of the gallons specially to Borrow gallons</p>
                                                            <hr>
                                                            <p>Borrow jugs</p>
                                                            <input class="form-control" value="0" name="borrow" type="number" min="0">
                                                            <p>Buy jugs</p>
                                                            <input class="form-control" value="0" name="buy" type="number" min="0">
                                                            <p>Own jugs</p>
                                                            <input class="form-control" value="0" name="own" type="number" min="0">
                                                            <p>
                                                                <input type="number" name="quantity" value="1" hidden>
                                                                @error('quantity')
                                                                <span class="text-danger">Make sure add quantity either (Borrow, Buy or Having own jugs)</span>
                                                                @enderror
                                                            </p>
                                                        </div>
                                                        <div class="card-footer">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary w-100" {{ $product->product_quantity == 0 ? 'disabled' : '' }}>Add to Cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @empty
                                            <p class="text-center">No products available.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty
                        <h3 class="text-center mt-5">No available stations in your location</h3>
                        <p class="text-center">You can update your Municipality here. <a href="/customer/settings/{{ auth()->user()->id }}" class="btn btn-link">Update</a></p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
