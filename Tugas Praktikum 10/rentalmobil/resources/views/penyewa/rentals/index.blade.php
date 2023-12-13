@extends('layouts.car')

@section('content')
    <div class="content">
        <h2>Form Penyewaan Mobil</h2>
        <form method="POST" action="{{ route('rentals1.store') }}" enctype="multipart/form-data">
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
                <select class="form-control" name="has_driver" id="has_driver" required>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
            </div>

            <!-- Informasi Driver (ditampilkan hanya ketika memilih menyewa driver) -->
            <div class="form-group" id="driver_options" style="display: none;">
                <label for="driver_id">Pilih Driver:</label>
                <select class="form-control" name="driver_id" id="driver_id">
                    @foreach ($availableDrivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
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
        
        <script>
            // Tampilkan/masukkan driver_options jika user memilih "Ya" untuk menyewa driver
            document.getElementById('has_driver').addEventListener('change', function() {
                var driverOptions = document.getElementById('driver_options');
                driverOptions.style.display = this.value === '1' ? 'block' : 'none';
            });
        </script>
@endsection
