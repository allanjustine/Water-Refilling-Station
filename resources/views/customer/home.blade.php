@extends('layouts.user.app')
 
@include('layouts.user.Usersidebar')
@section('content')

<style>
    .user-name {
        color: #3366cc; /* Set your desired text color */
        font-weight: bold; /* Set other styles as needed */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <img src="{{ asset('../images/wrs.jpeg') }}" width="350px" class="circle-logo">


                
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                        <a href="{{url('admin/routes')}}">Admin</a>
                    @else
                        <div class="panel-heading">
                            Welcome,
                            <a class="user-name" href="{{ route('customer.profile') }}">
                                <b>{{ auth()->user()->name }}</b>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
