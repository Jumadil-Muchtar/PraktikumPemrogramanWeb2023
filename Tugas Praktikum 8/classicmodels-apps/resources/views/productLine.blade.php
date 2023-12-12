@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mb-3">Data Product Line</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th class="text-center align-middle" scope="col">Product Line</th>
                    <th class="text-center align-middle" scope="col">Desc</th>
                    <th class="text-center align-middle" scope="col">HTML Desc</th>
                    <th class="text-center align-middle" scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productLine as $productLines)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $productLines->productLine }}</th>
                    <td class="align-middle">{{ $productLines->textDescription }}</td>
                    <td class="text-center align-middle">{{ $productLines->htmlDescription }}</td>
                    <td class="text-center align-middle">{{ $productLines->image }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
