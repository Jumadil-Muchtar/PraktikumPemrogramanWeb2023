@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Form Penyewaan Mobil</h2>
        <form method="POST" action="{{ route('rentals.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Informasi Penyewaan -->
            <div class="form-group">
                <label for="car_id">Pilih Mobil:</label>
                <select class="form-control" name="car_id" required>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->car_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="has_driver">Ingin Menyewa Driver?</label>
                <select class="form-control" name="has_driver" required>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <!-- Informasi Identitas -->
            <div class="form-group">
                <label for="sim_image">Foto SIM:</label>
                <input type="file" class="form-control" name="sim_image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="ktp_image">Foto KTP:</label>
                <input type="file" class="form-control" name="ktp_image" accept="image/*" required>
            </div>

            <!-- Informasi Pembayaran -->
            <div class="form-group">
                <label for="payment_proof">Bukti Pembayaran:</label>
                <input type="file" class="form-control" name="payment_proof" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Penyewaan</button>
        </form>

        <hr>

        <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Lihat Daftar Penyewaan</a>
    </div>
@endsection
