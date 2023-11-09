<h2>Update</h2>
<form method="POST" action="{{route ('update')}}"> 
    @csrf
    <!-- @method('PUT') -->
    <input type="number" name="id" placeholder="ID Produk">
    <input type="text" name="nama" placeholder="Nama Produk">
    <input type="text" name="merk" placeholder="Merk Produk">
    <input type="number" name="storage" placeholder="Storage Produk">
    <input type="number" name="ram" placeholder="Ram Produk">
    <input type="number" name="harga" placeholder="Harga Produk">

    <!-- Tambahkan field lain sesuai kebutuhan -->

    <button type="submit">Update</button>
    @if(session('success'))
        <p>
            {{ session('success') }}
        <p>
    @endif
    @if(session('error'))
        <p>
            {{ session('error') }}
        <p>
    @endif
</form>