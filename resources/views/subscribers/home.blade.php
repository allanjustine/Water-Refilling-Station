@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')

@section('content')
    <style>
        .user-name {
            color: pink;
            /* Set your desired text color */
            font-weight: bold;
            /* Set other styles as needed */
        }
    </style>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">DASHBOARD</h3>
                    </div>

                    <div class="card-body">
                        @if (auth()->user()->is_admin == 1)
                            <a href="{{ url('admin/routes') }}">Admin</a>
                        @else
                            <div class="panel-heading">
                                Welcome,
                                <a class="user-name" href="{{ route('subscribers.profile') }}">
                                    <b>{{ auth()->user()->name }}</b>
                                </a>
                                Your subscription is valid for <u><b>{{ auth()->user()->subscription_type }} </b></u>- Avail
                                At
                                <u><b>{{ auth()->user()->created_at->diffForHumans() }} - BILLINGS
                                        (&#8369;{{ number_format(auth()->user()->billings, 2) }})
                                        <br>
                                        <span class="text-danger">
                                            @if ($user->subscription_type === '1_month' && $daysUntilExpiration1Month > 0)
                                                @if ($daysUntilExpiration1Month <= 7)
                                                    <p>Dear Subscribers! Your {{ $user->subscription_type }} subscription
                                                        will expire in {{ $daysUntilExpiration1Month }} day(s).</p>
                                                    <p class="text-danger">YOUR BILLINGS
                                                        (&#8369;{{ number_format(auth()->user()->billings, 2) }})</p>
                                                @endif
                                            @elseif ($user->subscription_type === '1_year' && $daysUntilExpiration1Year > 0)
                                                @if ($daysUntilExpiration1Year <= 7)
                                                    <p>Dear Subscribers! Your {{ $user->subscription_type }} subscription
                                                        will expire in {{ $daysUntilExpiration1Year }} day(s).</p>
                                                    <p class="text-danger">YOUR BILLINGS
                                                        (&#8369;{{ number_format(auth()->user()->billings, 2) }})</p>
                                                @endif
                                            @else
                                                <p>Your Subscription is already consumed. Please Pay your BILLINGS
                                                    (&#8369;{{ number_format(auth()->user()->billings, 2) }})</p>
                                            @endif
                                        </span>
                                </u>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">My Invoices</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-hovered">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Invoice Date</th>
                                    <th>Due Date</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->invoice_no }}</td>
                                        <td>{{ optional($invoice->created_at)->format('F d, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($invoice->invoice_due_date)->format('F d, Y') }}
                                        </td>
                                        <td>₱{{ number_format($invoice->invoice_total - ($invoice->invoice_total * $invoice->invoice_discount) / 100, 2) }}
                                        </td>
                                        <td>{{ $invoice->invoice_discount }}%</td>
                                        <td><span
                                                class="{{ $invoice->status == 'Paid' ? 'text-success' : 'text-danger' }} px-3 py-2 border">{{ $invoice->status }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No invoice data yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">JUGS Monitoring</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-secondary text-white text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Sold JUGS</h5>
                                        <p class="card-text">{{ $sold }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-secondary text-white text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Borrow JUGS</h5>

                                        <p class="card-text">{{ $borrow }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-secondary text-white text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Remaining JUGS</h5>
                                        <p class="card-text">{{ auth()->user()->products()->sum('product_quantity') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Sales Monitoring</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-secondary text-white text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Today SALES</h5>
                                        <p class="card-text"><b>₱</b>{{ number_format($todaySales, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-secondary text-white text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Monthly SALES</h5>
                                        <p class="card-text"><b>₱</b>{{ number_format($monthlySales, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-secondary text-white text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Total SALES</h5>
                                        <p class="card-text"><b>₱</b>{{ number_format($totalSales, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
