@extends('layouts.admin.AdminApp')

@include('layouts.admin.Adminsidebar')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">{{ $user->name }} Invoices, {{ $user->station }}</h3>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscriberInvoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->invoice_no }}</td>
                                    <td>{{ optional($invoice->created_at)->format('F d, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->invoice_due_date)->format('F d, Y') }}
                                    </td>
                                    <td>₱{{ number_format($invoice->invoice_total - ($invoice->invoice_total * $invoice->invoice_discount) / 100, 2) }}
                                    </td>
                                    <td>{{ $invoice->invoice_discount }}%</td>
                                    <td><span class="{{ $invoice->status == 'Paid' ? 'text-success' : 'text-danger' }} px-3 py-2 border"><b>{{ $invoice->status }}</b></span></td>
                                    <td><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#invoice{{ $invoice->id }}">Update</a></td>
                                </tr>
                                <div class="modal fade" id="invoice{{ $invoice->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Updating invoice
                                                        for
                                                        {{ $invoice->user->name }}.</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group mb-3">
                                                        <label for="invoice_discount">Invoice Discount</label>
                                                        <input type="number" name="invoice_discount"
                                                            class="form-control @error('invoice_discount') is-invalid @enderror"
                                                            required value="{{ $invoice->invoice_discount }}">
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
                                                            <option value="Paid" {{ $invoice->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                                            <option value="Unpaid" {{ $invoice->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
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
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No invoice data yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
