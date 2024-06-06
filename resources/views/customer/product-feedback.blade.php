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

<div>
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center" style="text-transform: uppercase;">
                    <!-- <a href="/products" class="btn btn-secondary">Back--></a> Users Feedbacks in this Product <strong>{{ $products->name }}</strong>
                </h2>
            </div>

            <div class="card-body p-3">
                <div class="d-flex justify-content-center"><img class="img-fluid" style="width: 300px; height: 300px;" src="{{ Storage::url($products->image) }}" alt=""></div>
                <hr>
                <div class="text-center">
                    <div class="card border">

                        @forelse($products->ratings as $rating)
                        <strong>
                            <h4>{{ $rating->user->name }}</h4>
                        </strong>
                        <h6>{{ $rating->feedback }}</h6>

                    @empty
                        <strong>
                            <h6>No Ratings Yet.</h6>
                        </strong>
                    @endforelse
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
