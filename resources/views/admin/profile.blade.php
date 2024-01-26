@extends('layouts.admin.AdminApp')

@include('layouts.admin.Adminsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h1>My Profile</h1></div>

                @if (Auth::user())
                    <div class="card-body">

                        <table class="styled-table" align="center">
                                <tr>
                                    <td>Image</td>
                                    <td>UserName</td>
                                    <td>Email</td>
                                    <td>Role</td>
                                    <!--<td>Action</td>-->
                                </tr>

                                <tr>
                                    <td>{{ Auth::user()->avatar }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ Auth::user()->email }}</td>
                                    <td>{{ Auth::user()->type }}</td>


                                <!--<td>
                                    <a href="{{url('delete', Auth::user()->id)}}">Delete</a>
                                    <a href="{{route('users.avatar', Auth::user()->id)}}">Update</a>
                                </td>-->
                            </tr>

                        </table>

                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
