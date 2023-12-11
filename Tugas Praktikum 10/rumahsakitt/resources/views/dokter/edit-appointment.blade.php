<!DOCTYPE html>
<html>
  <head> 
    @include('dokter.layout.css')

    <style>
  
      .form__group {
        position: relative;
        padding: 20px 0 0;
        width: 100%;
        max-width: 180px;
      }

      .form__field {
        font-family: inherit;
        width: 100%;
        border: none;
        border-bottom: 2px solid #9b9b9b;
        outline: 0;
        font-size: 17px;
        color: #fff;
        padding: 7px 0;
        background: transparent;
        transition: border-color 0.2s;
      }

      .form__field::placeholder {
        color: transparent;
      }

      .form__field:placeholder-shown ~ .form__label {
        font-size: 17px;
        cursor: text;
        top: 20px;
      }

      .form__label {
        position: absolute;
        top: 0;
        display: block;
        transition: 0.2s;
        font-size: 17px;
        color: #9b9b9b;
        pointer-events: none;
      }

      .form__field:focus {
        padding-bottom: 6px;
        font-weight: 700;
        border-width: 3px;
        border-image: linear-gradient(to right, #001B79, #03C988);
        border-image-slice: 1;
      }

      .form__field:focus ~ .form__label {
        position: absolute;
        top: 0;
        display: block;
        transition: 0.2s;
        font-size: 17px;
        color: #03C988;
        font-weight: 700;
      }

      /* reset input */
      .form__field:required, .form__field:invalid {
        box-shadow: none;
      }

        .button {
          position: relative;
          width: 150px;
          height: 40px;
          cursor: pointer;
          display: flex;
          align-items: center;
          border: 1px solid #34974d;
          background-color: #3aa856;
        }

        .button, .button__icon, .button__text {
          transition: all 0.3s;
        }

        .button .button__text {
          transform: translateX(30px);
          color: #fff;
          font-weight: 600;
        }

        .button .button__icon {
          position: absolute;
          transform: translateX(109px);
          height: 100%;
          width: 39px;
          background-color: #34974d;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .button .svg {
          width: 30px;
          stroke: #fff;
        }

        .button:hover {
          background: #34974d;
        }

        .button:hover .button__text {
          color: transparent;
        }

        .button:hover .button__icon {
          width: 148px;
          transform: translateX(0);
        }

        .button:active .button__icon {
          background-color: #2e8644;
        }

        .button:active {
          border: 1px solid #2e8644;
        }
    </style>
  </head>
  <body>

            @include('dokter.layout.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
            @include('dokter.layout.sidebar')
      <!-- Sidebar Navigation end-->
      
      <div class="container-fluid page-body-wrapper">

        {{-- @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
          </div>
        @endif --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                
                {{-- Akses data dokter --}}
                @if(session('doctor'))
                    <div>
                        Informasi Dokter:
                        <ul>
                            <li>Nama: {{ session('doctor')->name }}</li>
                            <li>Email: {{ session('doctor')->email }}</li>
                            {{-- Tambahkan detail dokter lainnya sesuai kebutuhan --}}
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        <div class="container d-flex justify-content-center ">
          <!-- Contoh formulir -->
          <form action="{{ route('upload.appointment') }}" method="post">
            @csrf
            @method('POST')

            <!-- Field untuk memilih pasien -->
            <label for="patient_id">Pilih Pasien:</label>
            <select name="patient_id" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
            <br>
            <!-- Field untuk memasukkan keluhan pasien -->
            <label for="patient_complaints">Keluhan Pasien:</label>
            <textarea name="patient_complaints" required></textarea>
            <br>
            <!-- Field untuk memilih status -->
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="menunggu">Menunggu</option>
                <option value="sedang konsultasi">Sedang Konsultasi</option>
                <option value="selesai">Selesai</option>
                <option value="ditolak">Ditolak</option>
            </select>
            <br>
            <!-- Field untuk memasukkan nomor antrian -->
            <label for="queue_number">Nomor Antrian:</label>
            <input type="text" name="queue_number" />
            <br>
            <!-- Field untuk memilih tanggal jadwal temu -->
            <label for="appointment_date">Tanggal Jadwal Temu:</label>
            <input type="datetime-local" name="appointment_date" required>
            <br>
            <button type="submit">Buat Jadwal Temu</button>
          </form>

        </div>

      </div>
      
      
      @include('dokter.layout.footer')
      </div>
    </div>
    <!-- JavaScript files-->
    @include('dokter.layout.script')
  </body>
</html>