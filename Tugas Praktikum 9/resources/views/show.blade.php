@extends('layouts.main')
<style>
    label {
        color: #164863;
        width: 150px;
    }

    img {
        display: flex;
        margin-left: auto;
        margin-right: auto;
    }

    table {
        text-align: justify;
        margin-top: 20px;
    }
</style>
@section('container')
    <div class="container">
        <center>
            <div class="row justify-content-center">
                <div class="col-sm-8 mt-5">
                    <div class="card p-4">
                        <img src="/img/{{ $product->image }}" width="250px" height="50%">
                        <table>
                            <form>
                                <tr>
                                    <h3><label></label></h3>
                                    <h3><span>{{ $product->nama }}</span></h3>
                                </tr>
                                <tr>
                                    <td><label><b>Harga Barang</b></label></td>
                                    <td><span>: Rp {{ number_format($product->harga, 0, ',', '.') }}</span></td>
                                </tr>
                                <tr>
                                    <td><label><b>Jenis Barang</b></label></td>
                                    <td><span>: {{ $product->jenis }}</span></td>
                                </tr>
                                <tr>
                                    <td><label><b>Deskripsi Barang</b></label></td>
                                    <td><span>: {{ $product->deskripsi }}</span></td>
                                </tr>
                            </form>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <a href="/product" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </center>
    </div>
@endsection
