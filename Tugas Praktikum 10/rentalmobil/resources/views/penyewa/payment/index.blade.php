@extends('layouts.payment')

@section('content')
    <div class="content">
        <!-- Payment List -->
        <h3>Payment List:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Status Payment</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->status_payment }}</td>
                        <td>{{ $payment->payment_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Create Payment Form -->
        <h3>Create Payment:</h3>
        <form method="POST" action="{{ route('payments1.store') }}">
            @csrf
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" class="form-control" name="amount" required>
            </div>
            <div class="form-group">
                <label for="status_payment">Status Payment:</label>
                <select class="form-control" name="status_payment" required>
                    <option value="Pending">Pending</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" class="form-control" name="payment_date" required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success">Create Payment</button>
        </form>
    </div>
@endsection
