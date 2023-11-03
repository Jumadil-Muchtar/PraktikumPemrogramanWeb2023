@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1>Data Product Line</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th scope="col">Product Line</th>
                    <th scope="col">Desc</th>
                    <th scope="col">HTML Desc</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productLine as $productLines)
                <tr>
                    <th scope="row">{{ $productLines->productLine }}</th>
                    <td>{{ $productLines->textDescription }}</td>
                    <td>{{ $productLines->htmlDescription }}</td>
                    <td>{{ $productLines->image }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
