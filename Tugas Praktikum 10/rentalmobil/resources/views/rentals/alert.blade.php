@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Penyewaan Berhasil</h2>
        <p>Terima kasih atas penyewaan Anda. Berikut adalah detail penyewaan:</p>

        <ul>
            <li><strong>Mobil:</strong> {{ $rental->car->car_type }}</li>
            <li><strong>Driver:</strong> {{ $rental->has_driver ? 'Ya' : 'Tidak' }}</li>
            <!-- Tampilkan informasi lainnya sesuai kebutuhan -->
        </ul>

        <p>Silakan tunggu konfirmasi dari admin. Anda dapat melihat status penyewaan Anda melalui halaman <a href="{{ route('rentals.index') }}">Penyewaan Saya</a>.</p>
    </div>
@endsection
