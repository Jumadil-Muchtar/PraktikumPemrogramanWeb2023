<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h2>Insert Data</h2>
    <form action="{{ route('create') }}" method="post">
         <!-- CSRF (Cross-Site Request Forgery)untuk melindungi aplikasi Anda dari serangan CSRF yang 
         dapat dieksploitasi oleh penyerang. -->
         @csrf
         <input type="text" name="nama" placeholder="Nama Produk">
        <input type="text" name="merk" placeholder="Merk Produk">
        <input type="number" name="storage" placeholder="Storage Produk">
        <input type="number" name="ram" placeholder="Ram Produk">
        <input type="number" name="harga" placeholder="Harga Produk">
        <button type="submit">Insert Produk</button>
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
</body>
</html>
