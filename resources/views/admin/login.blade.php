@extends('logintemp')
@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-header bg-warning text-center">
            <strong>Admin Login</strong>
        </div>

        <div class="card-body">
            @if(session()->has('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.check') }}" method="POST">
                {!! csrf_field() !!}

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="email" class="form-control" id="username" placeholder="Enter your email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@push('css')
<style>
    body {
        background-color: #f7f8fa;
    }

    .card {
        border-radius: 10px;
        border: none;
    }

    .card-header {
        font-size: 18px;
        font-family: 'Arial', sans-serif;
        padding: 15px;
    }

    .card-body {
        padding: 25px;
    }

    .form-label {
        font-family: 'Arial', sans-serif;
        font-size: 14px;
    }

    .form-control {
        padding: 10px;
        border-radius: 6px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 12px;
    }

    .alert {
        margin-bottom: 20px;
    }
</style>
@endpush
