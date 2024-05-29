@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">
                        {{ __('Create Gcash Information') }}
                    </h3>
                </div>

                <div class="card-body">
                    <form action="/subscribers/gcash" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div> --}}

                        <br>
                        <div class="form-group">
                            <label for="account_name">Account Name:</label>
                            <input type="text" name="account_name" class="form-control"  required>
                            @error('account_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="account_number">Account Number:</label>
                            <input type="number" name="account_number" class="form-control" required>
                            @error('account_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Add more fields as needed -->
                        <br>
                        <button type="submit" class="btn btn-primary">Create Gcash Information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
