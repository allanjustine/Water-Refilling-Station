@extends('layouts.admin.AdminApp')

@include('layouts.admin.Adminsidebar')

@section('content')

    <style>
        .important-notice {
            padding: 15px;
            margin: 15px 0;
            background-color: #ffeb3b; /* Yellow background */
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>ALL USERS!</h1></div>

                <div class="card-body">

                    <div class="important-notice">
                        Important Notice: <marquee>0-User, 1-Admin, 2-WRF, </marquee>
                    </div>

                    <table class="styled-table" align="center">
                        <tr>
                            <td>ID</td>
                            <td>UserName</td>
                            <td>Email</td>
                            <td>Role</td>
                            <!--<td>Action</td>-->
                        </tr>

                        @foreach($allusers as $users)
                            <tr>
                                <td>{{$users->id}}</td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->type}}</td>

                                <td>
                                    <a href="{{url('delete', $users->id)}}">Delete</a>
                                    <a href="{{route('users.edit', $users->id)}}">Update</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
