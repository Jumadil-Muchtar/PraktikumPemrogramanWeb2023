<!DOCTYPE html>
<html>
  <head> 
    @include('pharmacist.layout.css')

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
    @include('pharmacist.layout.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('pharmacist.layout.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="container" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
        <div> 
            <a href="{{ url('create_medicines') }}">
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
                  <th scope="col" style="padding: 25px;">Description</th>
                  <th scope="col" style="padding: 25px;">Type</th>
                  <th scope="col" style="padding: 25px;">Stock</th>
                  <th scope="col" style="padding: 25px;">Price</th>
                  <th scope="col" style="padding: 25px;">Action</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($medicines as $obat)
                <tr>
                    <td style="padding: 25px;">{{ $obat->id }}</td>
                    <td style="padding: 25px;">
                      @if($obat->image)
                        <img src="{{ asset('medicinesimage/' . $obat->image) }}" alt="{{ $obat->name }}" style="max-width: 100px; max-height: 100px;">
                      @else
                          No Image
                      @endif</td>
                    <td style="padding: 25px;">{{ $obat->name}}</td>
                    <td style="padding: 25px;">{{ $obat->description }}</td>
                    <td style="padding: 25px;">{{ $obat->type }}</td>
                    <td style="padding: 25px;">{{ $obat->stock }}</td>
                    <td style="padding: 25px;">{{ $obat->price }}</td>
                    <td class="d-flex py-3">
                      <a href="{{ route('edit-medicines', ['id' => $obat->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                      @if ($obat && property_exists($obat, 'id'))
                      {{ $obat->id }}
                      @endif
                      <!-- ... (tampilkan properti lainnya) -->
                      <form  method="POST" action="{{ route('delete-medicines', ['id' => $obat->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus obat ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
            </tbody>
            </table>
            {{ $medicines->links() }}
        </div>
      </div>
  </div>
      

        @include('pharmacist.layout.footer')
      </div>
    </div>
    <!-- JavaScript files-->
    @include('pharmacist.layout.script')
  </body>
</html>
