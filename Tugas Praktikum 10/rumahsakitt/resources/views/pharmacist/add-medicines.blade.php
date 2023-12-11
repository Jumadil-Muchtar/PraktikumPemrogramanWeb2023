<!DOCTYPE html>
<html>
  <head> 
    @include('pharmacist.layout.css')

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

            @include('pharmacist.layout.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
            @include('pharmacist.layout.sidebar')
      <!-- Sidebar Navigation end-->
      
      <div class="container-fluid page-body-wrapper">

        @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
          </div>
        @endif

        <div class="container d-flex justify-content-center ">
          <form action="{{ route('upload.medicines') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="name" style="color: #001B79">
                <label for="name" class="form__label">Name</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="description" style="color: #001B79">
                <label for="name" class="form__label">Description</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="type" style="color: #001B79">
                <label for="name" class="form__label">Type</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="stock" style="color: #001B79">
                <label for="name" class="form__label">Stock</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="price" style="color: #001B79">
                <label for="name" class="form__label">Price</label>
              </div>
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
      
      
       @include('pharmacist.layout.footer')
      </div>
    </div>
    <!-- JavaScript files-->
    @include('pharmacist.layout.script')
  </body>
</html>