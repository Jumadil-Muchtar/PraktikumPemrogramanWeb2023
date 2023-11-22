<h1 class="mt-4" style="color: #000000">Hasil Pencarian Produk : </h1>
    @foreach ($products as $product)
        <center>
            <ul class="container1 mt-4">
                <li>
                <a href="{{ route('show', $product->productName) }}"
                            style="color: #C70039 ; font-size:30px ">{{ $product->productName }}</a>
            </li>
            </ul>
        </center>
    @endforeach
    <a href="/" class="btn btn__main mt-4 mb-4" style="background-color: #000000">Back to home</a>