@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead">{{ __('You are logged in!') }}</p>

                    <!-- Tambahkan button dengan gaya yang lebih menarik -->
                    <a href="homepage" class="btn btn-primary btn-lg my-3">
                        <i class="fas fa-home"></i> Go to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








