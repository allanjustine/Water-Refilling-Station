@extends('layouts.admin.AdminApp')

@include('layouts.admin.Adminsidebar')

@section('content')

<style>
    .user-name {
        color: #ff0000;
        font-weight: bold;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .user-table th,
    .user-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .user-message {
        color: #3366cc;
        font-weight: bold;
    }

    .user-count {
        color: black;
        font-weight: bold;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <!-- Display the number of registered users -->
                    <table class="user-table">
                        <tr>
                            <th>Total Registered Users: <span class="user-count">{{ $userCount }}</span></th>
                        </tr>
                        <!-- Add a row for total products -->

                    </table>
                    
                    <br>
                    Welcome, 
                    <!-- Apply a CSS class to style the user name -->
                    <a class="user-name" href="{{ route('admin.profile') }}">
                        <b>{{ auth()->user()->name }}</b>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
