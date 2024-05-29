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
                    <h3 class="text-center">{{ __('Gcash Information') }}</h3>
                </div>

                <div class="card-body">
                    @if(session('gcashMessage'))
                    <div class="alert alert-success">{{ session('gcashMessage') }}</div>
                    @endif
                    @if(session('gcashMessageError'))
                    <div class="alert alert-danger">{{ session('gcashMessageError') }}</div>
                    @endif
                    <a href="/subscribers/gcash-create" class="btn btn-primary float-end">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($accounts as $gcash)
                            <tr>
                                <td>{{ $gcash->account_name }}</td>
                                <td>{{ $gcash->account_number }}</td>
                                <td>
                                    <form action="/gcash/delete/{{ $gcash->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/subscribers/gcash-information/edit/{{ $gcash->id }}" class="btn btn-primary">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                @empty
                                <td colspan="3" class="text-center">Not added gcash information yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
