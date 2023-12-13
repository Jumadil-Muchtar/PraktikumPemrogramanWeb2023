@extends('layouts.template')

@section('content')
<div class="content">
<h3>Daftar Mobil</h3>
    <div class="row">
        @foreach($cars as $car)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($car->car_image)
                        <img src="{{ asset('storage/public/car_images/' . $car->car_image) }}" class="card-img-top" alt="{{ $car->car_type }}">
                    @else
                        <img src="{{ asset('path/to/default/image.jpg') }}" class="card-img-top" alt="{{ $car->car_type }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->car_type }}</h5>
                        <p class="card-text">Harga per Jam: {{ $car->price_per_hour }}</p>
                        <p class="card-text">Status: {{ ucfirst($car->status) }}</p> <!-- Display status -->                     
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2">Hapus</button>
                            </form>
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info mr-2">Show</a>
                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <hr>

    <!-- Form Tambah Mobil Baru -->
    <h3>Tambah Mobil Baru</h3>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="car_type">Tipe Mobil:</label>
            <input type="text" class="form-control" name="car_type" value="{{ old('car_type') }}">
            @error('car_type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_per_hour">Harga per Hari:</label>
            <input type="number" class="form-control" name="price_per_hour" value="{{ old('price_per_hour') }}">
            @error('price_per_hour')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="number_license">Nomor Lisensi:</label>
            <input type="text" class="form-control" name="number_license" value="{{ old('number_license') }}">
            @error('number_license')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="car_image">Gambar Mobil:</label>
            <input type="file" class="form-control-file" name="car_image">
            @error('car_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status">
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="booked" {{ old('status') == 'booked' ? 'selected' : '' }}>Booked</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Tambah Mobil</button>
    </form>
</div>
@endsection
