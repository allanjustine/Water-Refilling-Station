@extends('layouts.admin.AdminApp')

@include('layouts.admin.Adminsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    User Account
                    <marquee><p>To Change the Role/Type 0 - User, 1 - Admin, 2 - Subscribers</p></marquee>
                </div>
    
                <div class="card-body">

                    <form action="{{ route('users.update', $users->id) }}" method="post">
                        @csrf
                        @method('put')

                        <label for="name">Name:</label>
                        <input type="text" name="name" value="{{ $users->name }}" required>

                        <label for="email">Email:</label>
                        <input type="email" name="email" value="{{ $users->email }}" required>

                        <label for="type">Role:</label>
                        <input type="text" name="type" value="{{ $users->type }}" required>

                        <!-- Add more fields as needed -->
                            <br><br>
                        <button type="submit">Make Changes</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection