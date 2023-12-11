<!DOCTYPE html>
<html>
  <head> 
    @include('dokter.layout.css')

    <style>
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
      <div class="container" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
        <div> 
            <a href="{{ url('create_appointment') }}">
                <button type="button" class="button">
                    <span class="button__text">Add Item</span>
                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                </button>
            </a>              
        </div>
        <div>
            <table class="table mt-5">
              <thead>
                  <tr>
                      <th>Pasien</th>
                      <th>Dokter</th>
                      <th>Keluhan</th>
                      <th>Status</th>
                      <th>Nomor Antrian</th>
                      <th>Tanggal Temu</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($appointments as $appointment)
                      <tr>
                          <td>{{ $appointment->patient->name }}</td>
                          <td>{{ $appointment->doctor->name }}</td>
                          <td>{{ $appointment->patient_complaints }}</td>
                          <td>{{ $appointment->status }}</td>
                          <td>{{ $appointment->queue_number }}</td>
                          <td>{{ $appointment->appointment_date }}</td>
                          <td>
                              <!-- Tambahkan tombol atau tautan untuk aksi lainnya -->
                              <a href="{{ route('edit-appointment', ['id' => $appointment->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                              <form method="POST" action="{{ route('delete-appointment', ['id' => $appointment->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus janji temu ini?')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" >Hapus</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
            {{ $appointments->links() }}
        </div>
      </div>
  </div>

       
        @include('dokter.layout.footer')
      </div>
    </div>
    <!-- JavaScript files-->
    @include('dokter.layout.script')
  </body>
</html>