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
                                    <td>
                                        @if(auth()->user()->avatar == null)
                                        <img class="img-fluid h-50 w-50" src="https://p7.hiclipart.com/preview/9/763/803/computer-icons-login-user-system-administrator-image-admin-thumbnail.jpg" alt="">
                                        @else
                                        <img class="img-fluid h-50 w-50" src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                                        @endif
                                    </td>
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
