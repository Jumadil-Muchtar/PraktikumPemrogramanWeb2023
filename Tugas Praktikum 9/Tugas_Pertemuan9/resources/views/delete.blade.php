<!-- Tombol untuk menghapus data -->
<h2>Delete</h2>
<form method="post" action="{{route ('delete')}}">
    @csrf
    <input type="number" name="id" placeholder="ID Produk">
    <!-- @method('DELETE') -->
    <button type="submit">Hapus</button>
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