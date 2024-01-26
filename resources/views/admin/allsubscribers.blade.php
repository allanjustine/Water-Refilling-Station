@extends('layouts.admin.AdminApp')

@include('layouts.admin.Adminsidebar')

@section('content')
    <style>
        .important-notice {
            padding: 15px;
            margin: 15px 0;
            background-color: #ffeb3b;
            /* Yellow background */
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">ALL SUBSCRIBERS!</h3>
                    </div>

                    <div class="card-body">

                        <div class="important-notice">
                            Important Notice: <marquee>0-User, 1-Admin, 2-WRF, </marquee>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('admin'))
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                {{ session('admin') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <table class="table">
                            <tr>
                                <td>ID</td>
                                <td>UserName</td>
                                <td>Email</td>
                                <td>Subscribe At</td>
                                <td>Subscription Expiration Date</td>
                                <td>Billings</td>
                                <td>Municipality & Station</td>
                                <td>Role</td>
                                <td>Action</td>
                            </tr>

                            @foreach ($subscriberData as $data)
                                <tr>
                                    <td>{{ $data['user']->id }}</td>
                                    <td>{{ $data['user']->name }}</td>
                                    <td>{{ $data['user']->email }}</td>
                                    <td>{{ $data['user']->created_at->diffForHumans() }}</td>
                                    <td><span class="text-danger">
                                            @if ($data['expirationRemaining'] > 0 && $data['user']->type == 'WRF')
                                                {{ $data['expirationRemaining'] . ' day(s) remaining' }}
                                            @else
                                                The subscription of this subscriber has already been consumed.
                                                @if ($data['user']->type == 'WRF')
                                                    Ready to be
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#disable{{ $data['user']->id }}"
                                                        class="btn btn-danger">Disable</a>
                                                @endif
                                            @endif
                                        </span></td>
                                    <td>
                                        @if ($data['user']->billings == 0)
                                            <span class="text-danger">
                                                Waiting Payment
                                            </span>
                                        @else
                                            &#8369;{{ number_format($data['user']->billings, 2) }}
                                        @endif
                                    </td>
                                    <td>{{ $data['user']->municipality }}, {{ $data['user']->station }}</td>
                                    <td class="{{ $data['user']->type == 'WRF' ? 'text-primary' : 'text-danger' }}">
                                        {{ $data['user']->type }}</td>

                                    @if ($data['user']->type == 'WRF')
                                        <td>
                                            <a href="{{ url('delete', $data['user']->id) }}">Delete</a>
                                            <a href="{{ route('users.edit', $data['user']->id) }}">Update</a>

                                            {{-- <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#disable{{ $data['user']->id }}">Disable</a> --}}

                                            <div class="d-flex">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#invoice{{ $data['user']->id }}"
                                                    class="btn btn-warning text-white">Create Invoice</a>
                                                <a href="/admin/subscriber/invoice/{{ $data['user']->id }}"
                                                    class="btn btn-info text-white">Update Invoice</a>
                                            </div>
                                        </td>
                                    @elseif ($data['user']->type == 'Disabled')
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#enable{{ $data['user']->id }}">Enable</a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#decline{{ $data['user']->id }}">Decline</a>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#approve{{ $data['user']->id }}">Approve</a>
                                        </td>
                                    @endif
                                </tr>
                                <div class="modal fade" id="decline{{ $data['user']->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Decline
                                                    {{ $data['user']->name }}?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to decline this request?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ url('delete', $data['user']->id) }}"
                                                    class="btn btn-danger">Decline</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="approve{{ $data['user']->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Approve
                                                    {{ $data['user']->name }}?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to approve this request?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.approval', $data['user']->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($data['user']->subscription_type == '1_month')
                                                        <input type="number" name="billings" hidden value="1000">
                                                    @else
                                                        <input type="number" name="billings" hidden value="12000">
                                                    @endif
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Approve</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="disable{{ $data['user']->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Disable
                                                    {{ $data['user']->name }}?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to disable this request?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.disable', $data['user']->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Disable</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="enable{{ $data['user']->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form action="{{ route('admin.enable', $data['user']->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enable
                                                        {{ $data['user']->name }}?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to enable this request?

                                                    {{-- <div class="mt-3">

                                                        <div>
                                                            <label for="subscription_type" class="form-label text-md-end"
                                                                style="color: black;"><b>{{ __('Select Subscription Type') }}</b></label>
                                                            <select id="subscription_type" class="form-select"
                                                                name="subscription_type" required>
                                                                <option value="1_month" {{ $data['user']->subscription_type == '1_month' ? 'selected' : '' }}>1 Month</option>
                                                                <option value="1_year" {{ $data['user']->subscription_type == '1_year' ? 'selected' : '' }}>1 Year</option>
                                                            </select>

                                                            @error('subscription_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    @if ($data['user']->subscription_type == '1_month')
                                                        <input type="number" name="billings" hidden value="1000">
                                                    @else
                                                        <input type="number" name="billings" hidden value="12000">
                                                    @endif
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Enable</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="invoice{{ $data['user']->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('invoice') }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Creating invoice
                                                        for
                                                        {{ $data['user']->name }}.</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="number" name="user_id" value="{{ $data['user']->id }}"
                                                        hidden>
                                                    @if ($data['user']->subscription_type == '1_month')
                                                        <input type="number" name="invoice_total" hidden value="1000"
                                                            hidden>
                                                    @else
                                                        <input type="number" name="invoice_total" hidden value="12000"
                                                            hidden>
                                                    @endif
                                                    <div class="form-group mb-3">
                                                        <label for="invoice_no">Invoice #</label>
                                                        <input type="number" name="invoice_no"
                                                            class="form-control @error('invoice_no') is-invalid @enderror"
                                                            required value="{{ old('invoice_no') }}">
                                                        @error('invoice_no')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="invoice_due_date">Invoice Due Date</label>
                                                        <input type="date" name="invoice_due_date"
                                                            class="form-control @error('invoice_due_date') is-invalid @enderror"
                                                            required value="{{ old('invoice_due_date') }}">
                                                        @error('invoice_due_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="invoice_discount">Invoice Discount</label>
                                                        <input type="number" name="invoice_discount"
                                                            class="form-control @error('invoice_discount') is-invalid @enderror"
                                                            required value="{{ old('invoice_discount') }}">
                                                        @error('invoice_discount')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="status">Status</label>

                                                        <select name="status" id=""
                                                            class="form-select @error('status') is-invalid @enderror">
                                                            <option selected hidden>Select Status of the Invoice</option>
                                                            <option disabled>Select Status of the Invoice</option>
                                                            <option value="Paid">Paid</option>
                                                            <option value="Unpaid">Unpaid</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Send Invoice</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
