@extends('logintemp')
@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <strong>Register Form</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.register') }}" method="post">
                {!! csrf_field() !!}

                <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your first name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
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
        padding: 15px;
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-size: 14px;
    }

    .form-control {
        padding: 10px;
        border-radius: 6px;
    }

    .btn-block {
        width: 100%;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        padding: 12px;
    }
</style>
@endpush
