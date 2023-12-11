<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

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

            @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
            @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

          <div class="container" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
            <div> 
                <a href="{{ url('create_patient') }}">
                    <button type="button" class="button">
                        <span class="button__text">Add Item</span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                    </button>
                </a>              
            </div>
            <div>
                <table class="table mt-5">
                  <thead >
                    <tr>
                      <th scope="col" style="padding: 25px;">ID</th>
                      <th scope="col" style="padding: 25px;">Profile</th>
                      <th scope="col" style="padding: 25px;">Name</th>
                      <th scope="col" style="padding: 25px;">Gender</th>
                      <th scope="col" style="padding: 25px;">Origin</th>
                      <th scope="col" style="padding: 25px;">Birth Date</th>
                      <th scope="col" style="padding: 25px;">Age</th>
                      <th scope="col" style="padding: 25px;">Treatment</th>
                      <th scope="col" style="padding: 25px;">Phone Number</th>
                      <th scope="col" style="padding: 25px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($patient as $pasien)
                    <tr>
                        <td style="padding: 25px;">{{ $pasien->id }}</td>
                        <td style="padding: 25px;">
                          @if($pasien->image)
                            <img src="{{ asset('patientimage/' . $pasien->image) }}" alt="{{ $pasien->name }}" style="max-width: 100px; max-height: 100px;">
                          @else
                              No Image
                          @endif</td>
                        <td style="padding: 25px;">{{ $pasien->name}}</td>
                        <td style="padding: 25px;">{{ $pasien->gender }}</td>
                        <td style="padding: 25px;">{{ $pasien->origin }}</td>
                        <td style="padding: 25px;">{{ $pasien->birth }}</td>
                        <td style="padding: 25px;">{{ $pasien->year }}</td>
                        <td style="padding: 25px;">{{ $pasien->treatment }}</td>
                        <td style="padding: 25px;">{{ $pasien->phone }}</td>
                        <td class="d-flex py-3">
                          <a href="{{ route('edit-patient', ['id' => $pasien->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                          @if ($pasien && property_exists($pasien, 'id'))
                          {{ $pasien->id }}
                          @endif
                          <!-- ... (tampilkan properti lainnya) -->
                          <form  method="POST" action="{{ route('delete-patient', ['id' => $pasien->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                </tbody>
                </table>
                {{ $patient->links() }}
            </div>
          </div>
      </div>
        
      
      
        <footer class="footer" style="bottom: 0; position: fixed;">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="admincss/vendor/jquery/jquery.min.js"></script>
    <script src="admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admincss/js/charts-home.js"></script>
    <script src="admincss/js/front.js"></script>
  </body>
</html>