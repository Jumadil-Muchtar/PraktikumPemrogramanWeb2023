@extends('layouts.template')

@section('content')
<div class="content">
    <h2>Detail Mobil</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $car->car_type }}</h5>
            <p class="card-text">Harga per Jam: {{ $car->price_per_hour }}</p>
            <p class="card-text">Status: {{ ucfirst($car->status) }}</p>
            <img src="{{ asset('storage/public/car_images/' . $car->car_image) }}" class="card-img-top" alt="{{ $car->car_type }}">

            <!-- Button untuk kembali ke halaman daftar mobil -->
            <a href="{{ route('cars.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
