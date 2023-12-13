<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        // Menampilkan status pembayaran setiap penyewa
        $payments = Payment::all();
        return view('payment.index', compact('payments'));
    }
    public function index1()
    {
        // Menampilkan status pembayaran setiap penyewa
        $payments = Payment::all();
        return view('penyewa.payment.index', compact('payments'));
    }

    public function create()
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {
        // Validasi data pembayaran
        $request->validate([
            'amount' => 'required|numeric',
            'status_payment' => 'required|in:Pending,Paid,Failed', // Sesuaikan dengan status yang dibutuhkan
            'payment_date' => 'required|date',
        ]);

        // Menambahkan pembayaran dengan mengatur ID user
        $request['user_id'] = auth()->id();  // Sesuaikan dengan cara Anda mendapatkan ID pengguna
        Payment::create($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }
    public function store1(Request $request)
    {
        // Validasi data pembayaran
        $request->validate([
            'amount' => 'required|numeric',
            'status_payment' => 'required|in:Pending,Paid,Failed', // Sesuaikan dengan status yang dibutuhkan
            'payment_date' => 'required|date',
        ]);

        // Menambahkan pembayaran dengan mengatur ID user
        $request['user_id'] = auth()->id();  // Sesuaikan dengan cara Anda mendapatkan ID pengguna
        Payment::create($request->all());

        return redirect()->route('payments1.index')
            ->with('success', 'Payment created successfully.');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data pembayaran
        $request->validate([
            'amount' => 'required|numeric',
            'status_payment' => 'required|in:Pending,Paid,Failed', // Sesuaikan dengan status yang dibutuhkan
            'payment_date' => 'required|date',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }
}
