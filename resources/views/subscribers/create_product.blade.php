@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    <form action="/subscribers/products/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control"  required>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" class="form-control"  step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="product_quantity">Quantity:</label>
                            <input type="number" name="product_quantity" class="form-control"  min="1" required>
                        </div>

                        <!-- Add more fields as needed -->
                        <br>
                        <button type="submit" class="btn btn-primary">Create Product</button>
                        <a href="{{ url('/subscribers/products') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
