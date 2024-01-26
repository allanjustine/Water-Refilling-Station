@extends('layouts.app')

@section('content')
    <style>
        .user-name {
            color: #3366cc;
            /* Set your desired text color */
            font-weight: bold;
            /* Set other styles as needed */
        }

        body {
            background-image: url('{{ asset('../images/3.jpg') }}');
            background-size: cover;
            /* Adjust as needed */
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Ensures the background stays fixed while scrolling */
        }
    </style>

    {{-- <div class="container d-flex justify-content-center">
        <form class="form-inline mb-3 col-6" action="{{ route('search') }}" method="GET">
            @csrf
            <div class="input-group">

                <input type="search" class="form-control" placeholder="Search location" aria-label="Search"
                    aria-describedby="button-addon2" name="search" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-dark" type="submit" id="button-addon2"><i class="far fa-magnifying-glass"></i>
                        Search</button>
                </div>
            </div>
        </form>
    </div> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">{{ __('Municipalities') }}</h1>
                    </div>

                    <table class="styled-table table table-striped">
                        <thead>
                            <tr>
                                <thead>
                                    <th>
                                        <h2><b>CHOOSE OPTION</b></h2>
                                    </th>
                                    <th>
                                        <h2><b>MUNICIPALITY</b></h2>
                                    </th>
                                </thead>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($municipalities as $mun)
                                <tr>

                                    <td colspan="2" class="text-center">
                                        <a href="/water-refilling/products/{{ $mun }}" class="btn">
                                            <h3><b>{{ $mun }}</b></h3>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
