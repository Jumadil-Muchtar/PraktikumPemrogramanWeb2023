<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

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

            @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
            @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      
      <div class="container-fluid page-body-wrapper">

        @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
          </div>
        @endif

        <div class="container d-flex justify-content-center ">
          <form form action="{{ route('update-doctor', ['id' => $doctor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field @error('name') is-invalid @enderror" placeholder="Name" required="" name="name" value="{{ $doctor->name }}" style="color: #001B79" >
                <label for="name" class="form__label">Name</label>
              </div>
              @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field @error('phone') is-invalid @enderror" placeholder="Name" required="" name="phone"  value="{{ $doctor->phone }}" style="color: #001B79">
                <label for="name" class="form__label">Phone Number</label>
              </div>
              @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <select name="spesialis" id="spesialis" class="form-select @error('spesialis') is-invalid @enderror">
                  @if ($doctor->spesialis === 'jantung')
                      <option value="jantung" selected>Jantung</option>
                      <option value="bedah">Bedah</option>
                      <option value="tht">THT</option>
                  @elseif ($doctor->spesialis === 'bedah')
                      <option value="bedah" selected>Bedah</option>
                      <option value="jantung">Jantung</option>
                      <option value="tht">THT</option>
                  @elseif ($doctor->spesialis === 'tht')
                      <option value="tht" selected>THT</option>
                      <option value="jantung">Jantung</option>
                      <option value="bedah">bedah</option>
                  @endif
                </select>
              </div>
              @error('spesialis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field @error('room') is-invalid @enderror" placeholder="Name" required="" name="room" value="{{ $doctor->room }}" style="color: #001B79">
                <label for="name" class="form__label">Room Number</label>
              </div>
              @error('room')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="file" name="image">
              </div>
            </div>
            <div class="doctorname mt-5">   
              <button type="submit" class="button">
                <span class="button__text">Add Item</span>
                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
              </button>
            </div>
          </form>
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