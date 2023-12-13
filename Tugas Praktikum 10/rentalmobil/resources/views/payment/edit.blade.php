<!-- resources/views/payment/edit.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="container">
        <h2>Edit Payment:</h2>

        <!-- Edit Payment Form -->
        <form method="POST" action="{{ route('payments.update', $payment->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" class="form-control" name="amount" value="{{ $payment->amount }}" required>
            </div>
            <div class="form-group">
                <label for="status_payment">Status Payment:</label>
                <select class="form-control" name="status_payment" required>
                    <option value="Pending" {{ $payment->status_payment === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Paid" {{ $payment->status_payment === 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Failed" {{ $payment->status_payment === 'Failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" class="form-control" name="payment_date" value="{{ $payment->payment_date }}" required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-primary">Update Payment</button>
        </form>
    </div>
@endsection
