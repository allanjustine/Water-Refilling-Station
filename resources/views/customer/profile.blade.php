@extends('layouts.user.app')
 
@include('layouts.user.Usersidebar')
@section('content')

<style>
    .user-name {
        color: #3366cc; /* Set your desired text color */
        font-weight: bold; /* Set other styles as needed */
    }

    p.ex1 {
        font-size: 60px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>
                <div class="card-body">
                    
                <h1>
                    <b>
                        <p class="ex1">NOT AVAILABLE.</p>
                    </b>
                </h1>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
