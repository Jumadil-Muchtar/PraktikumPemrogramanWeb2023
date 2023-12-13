@extends('layouts.template')

@section('content')
    <div class="content">
        <h2>Detail Mobil</h2>
        <div class="card">
            @if ($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->car_type }}">
            @else
                {{-- Sediakan gambar default atau alternatif jika tidak ada gambar tersedia --}}
                <img src="{{ asset('path/to/default/image.jpg') }}" class="card-img-top" alt="{{ $car->car_type }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $car->car_type }}</h5>
                <p class="card-text">Harga per Jam: {{ $car->price_per_hour }}</p>
                <p class="card-text">Nomor Lisensi: {{ $car->number_license }}</p>
                <!-- Tampilkan kolom-kolom lain jika diperlukan -->
                <a href="{{ route('rentals.create', ['car_id' => $car->id]) }}" class="btn btn-primary">Sewa Mobil</a>
            </div>
        </div>
    </div>
@endsection
